<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secret;
use DateTime;
use DateInterval;
use XMLWriter;
use Illuminate\Support\Facades\Validator;

class SecretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Az összes adat lekérése
        return  Secret::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'secret' => 'required|string|max:255',
            'expiresAt' =>'numeric|gt:0',
            'expireAfterViews' => 'required|numeric|gt:0'
        ]);

        if ($validator->fails()) {
            return response('Invalid input', 405);
        }


        // Az adat eltárolása
        $secret = new Secret();
        $now = new DateTime();
        
        if ((int)$request->expireAfter !== 0) {
            $expiresAt = new DateTime();
            $expiresAt->add(new DateInterval('PT' . $request->expireAfter . 'M'));
        } else {
            $expiresAt = null;
        }

        $hash = hash('sha512', $request->secret . $now->format('Y-m-d H:i:s'));
        $secret->hash = $hash;
        $secret->secretText = $request->secret;
        $secret->createdAt = $now;
        $secret->expiresAt = $expiresAt;
        $secret->reamingViews = $request->expireAfterViews;
        $secret->save();

        return $this->returnData($request, Secret::find($hash));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hash, Request $request)
    {
        $secret = Secret::find($hash);
        if ($secret) {
            $now = new DateTime();
            $end = new DateTime($secret->expiresAt);

            if (($secret->reamingViews > 0) && (($secret->expiresAt === null) || ($now <= $end))) {
                $secret->reamingViews = (int) $secret->reamingViews - 1;
                $secret->save();

                return $this->returnData($request, $secret);
            } else {
                return response('Secret not found!', 404);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $hash)
    {
        // Az adat módosítása
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($hash)
    {
        // Az adat törlése
        return false;
    }

    private function generateXML($data)
    {
        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();
        $xmlWriter->startDocument('1.0', 'UTF-8');
        $xmlWriter->startElement('Secret');

        $this->createXMLElement($xmlWriter, $data);

        $xmlWriter->endElement();
        $xmlWriter->endDocument();
        return $xmlWriter->outputMemory();
    }

    private function createXMLElement(XMLWriter $xmlWriter, $data)
    {
        if (gettype($data) === 'array') {
            foreach ($data as $key => $value) {
                if (gettype($value) === 'array') {
                    $this->createXMLElement($xmlWriter, $value);
                } else {
                    $xmlWriter->startElement($key);
                    $xmlWriter->text($value);
                    $xmlWriter->endElement();
                }
            }
        }
        return true;
    }

    private function returnData(Request $request, Secret $secret) 
    {
        if ($request->header('Accept') == 'application/json') {
            return response(json_encode($secret->getAttributes()))
                ->header('Content-Type', 'application/json')
                ->header('Access-Control-Allow-Origin', '*');
        } else if ($request->header('Accept') == 'application/xml') {
            return response($this->generateXML($secret->getAttributes()))
                ->header('Content-Type', 'application/xml');
        }        
    }
}
