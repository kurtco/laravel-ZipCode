<?php

namespace Cinema\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\User;
use Session;
use Redirect;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuario.create');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //datos de prueba
        //LA: 94062
        //NY: 31410


        $Zipcode1 = $request->input('Zipcode1');//parametro
        $Zipcode2 = $request->input('Zipcode2');//parametro
    
        $client = new Client(); //GuzzleHttp\Client
        //https://www.zipcodeapi.com/rest/35IX1dV0sJhk2GFiwFh9oQLUKeFg5Dm8J46Kh1LKK25MIK5fqmpOcaIWoodu2zCM/multi-info.json/85383,85716/degrees
        $url = "www.zipcodeapi.com/rest/reAvmprCALr66GvVjB0O71l64RQ22EMuTn0fNrSncjui0ZejAf7IgtOllFookaSd/multi-info.json/".$Zipcode1.",".$Zipcode2."/degrees";
        $r = $client->get($url);
        $json = json_decode($r->getBody(), true);

        //ciudades donde estan los agentes (por zipcode)
        $agente1Localizacion = $json[intval($Zipcode1)]["timezone"]["timezone_identifier"];
        $agente2Localizacion = $json[intval($Zipcode2)]["timezone"]["timezone_identifier"];

        $ciudadesaAgente1 = DB::table('users')->where('location', $agente1Localizacion)->get();
        $arrayTodosAgente1 = json_decode(json_encode($ciudadesaAgente1), true);
        $ciudadesaAgente2 = DB::table('users')->where('location', $agente2Localizacion)->get();
        $arrayTodosAgente2 = json_decode(json_encode($ciudadesaAgente2), true);    
       
        $todos = DB::table('users')->get();
        $arrayTodos = json_decode(json_encode($todos), true);


        $arrayGlue = array();
        $arrayGlue2 = array();
        foreach ($arrayTodos as $key => $value) {
            $distanciaAgente1 = 0;
            $distanciaAgente2 = 0;

            // filtramos aquellos "usuarios" que NO esten en las ciudades de los agentes
            if($value["location"]!=$agente1Localizacion && $value["location"]!=$agente2Localizacion){
                $url = "www.zipcodeapi.com/rest/reAvmprCALr66GvVjB0O71l64RQ22EMuTn0fNrSncjui0ZejAf7IgtOllFookaSd/distance.json/".$Zipcode1."/".$value["zipcode"]."/km";
                $r = $client->get($url);
                $json = json_decode($r->getBody(), true);


                $distanciaAgente1 = $json["distance"];


                $url2 = "www.zipcodeapi.com/rest/reAvmprCALr66GvVjB0O71l64RQ22EMuTn0fNrSncjui0ZejAf7IgtOllFookaSd/distance.json/".$Zipcode2."/".$value["zipcode"]."/km";
                $r2 = $client->get($url2);
                $json2 = json_decode($r2->getBody(), true);
                $distanciaAgente2 = $json2["distance"];

                //verificamos con la informacion del api cual es la distancia de los "usuarios" con cada agente
                //.... el "usuario" que se encuentre a menor distancia del agente sera tomado por el mismo
                if( intval($distanciaAgente1) > intval($distanciaAgente2) ){
                    $arrayGlue[]  = array(
                        "id" => $value["id"],
                        "name" => $value["name"],
                        "zipcode" => $value["zipcode"],
                        "location" => $value["location"]
                    );
                    
                }else{
                    $arrayGlue2[]  = array(
                        "id" => $value["id"],
                        "name" => $value["name"],
                        "zipcode" => $value["zipcode"],
                        "location" => $value["location"]
                    );
                }

            }
        }// fin del loop


        array_merge($arrayTodosAgente2,$arrayGlue);//unimos el array del agente con lo de los usuarios segun su distancia
        array_merge($arrayTodosAgente1,$arrayGlue2);//unimos el array del agente con lo de los usuarios segun su distancia

        //mostramos la lista de los agentes y sus respectivos usuarios
        return view('usuario.index',['users'=>$arrayTodosAgente1, 'users2'=>$arrayTodosAgente2]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
