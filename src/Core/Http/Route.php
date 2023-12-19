<?php

namespace HorizonFramework\Core\Http;

class Route
{
    public static function get($uri, $accion = null)
    {
        //Leer los argumentos
        $searchArgv = stripos($uri, "{");
        
        //Estraer URI Base
        $uriBase = $uri;
        $argumentos = null;
        if ($searchArgv !== false) {
            $uriBase = substr($uri, 0, ($searchArgv - 1));
            $argumentos = substr($uri, $searchArgv);
        }

        if (!empty($argumentos)) {

            //Depuracion de argumentos
            $argumentos = str_replace(["{","}"], "", $argumentos);
            $argumentos = explode("/", $argumentos);

            //Leer los argumentos reales
            $argumentosReales = substr($_SERVER["REQUEST_URI"], $searchArgv);
            $argumentosReales = explode("/", $argumentosReales);

            //Cros arraglos para variables 
            $argumentosFinales = [];
            for ($i = 0; $i < count($argumentos); $i++) { 
                $argumentosFinales = array_merge($argumentosFinales, [
                    $argumentos[$i] => $argumentosReales[$i]
                ]);
            }
        }

        //Comprobar si la base uri iniciar igual a la uri real
        $inicioReal = substr($_SERVER["REQUEST_URI"], 0, ($searchArgv - 1));

        //Comprobar que sea la ruta
        if ($_SERVER["REQUEST_METHOD"] == "GET" && $uriBase == $inicioReal) {

            if (is_callable($accion)) {
                echo $accion();
                return;
            } else if (is_array($accion)){
                
                $class = $accion[0];
                $method = $accion[1];

                dd($argumentosFinales, ...$argumentosFinales);

                $instance = new $class();
                return $instance->{$method}(...$argumentosFinales);
            }
        }
    }

}
