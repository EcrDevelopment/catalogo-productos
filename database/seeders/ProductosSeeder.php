<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductosSeeder extends Seeder
{
    public function run()
    {
        $productos = [
            [
                'nombre' => 'Altavoz inteligente Amazon Echo Dot 5ta generación (2022)',
                'descripcion' => 'Control de voz con Alexa',
                'imagen' => 'https://coolboxpe.vtexassets.com/arquivos/ids/245161-200-200?v=638078429275430000&width=200&height=200&aspect=true',
                'precio' => 199.90,
            ],
            [
                'nombre' => 'Google Chromecast 4ta generación HD',
                'descripcion' => 'Google TV y control de voz Google Assistant',
                'imagen' => 'https://coolboxpe.vtexassets.com/arquivos/ids/305500-200-200?v=638300522788530000&width=200&height=200&aspect=true',
                'precio' => 249.90,
            ],
            [
                'nombre' => 'Kit de internet Satelital SpaceX Starlink Mini',
                'descripcion' => 'Alta velocidad y baja latencia, conecta hasta 128 dispositivos, compacto y portátil, Wi-Fi 5, blanco',
                'imagen' => 'https://coolboxpe.vtexassets.com/arquivos/ids/419185-200-200?v=638741988009030000&width=200&height=200&aspect=true',
                'precio' => 749.90,
            ],
            [
                'nombre' => 'Monitor curvo 34" Teros TE-3410G',
                'descripcion' => 'Panel VA, WQHD(1440), 165Hz, 1ms, entradas HDMI, FreeSync',
                'imagen' => 'https://coolboxpe.vtexassets.com/arquivos/ids/343383-200-200?v=638430126361100000&width=200&height=200&aspect=true',
                'precio' => 1259.90,
            ],
            [
                'nombre' => 'Ventilador de torre Westminster 32" 45W',
                'descripcion' => '3 velocidades, color negro',
                'imagen' => 'https://coolboxpe.vtexassets.com/arquivos/ids/411806-200-200?v=638744700401200000&width=200&height=200&aspect=true',
                'precio' => 79.90,
            ],
            [
                'nombre' => 'Meta Quest 3S',
                'descripcion' => '128 GB, gafas de realidad virtual, inmersión total, entretenimiento sin límites, blanco',
                'imagen' => 'https://coolboxpe.vtexassets.com/arquivos/ids/422710-200-200?v=638749715574500000&width=200&height=200&aspect=true',
                'precio' => 1649.00,
            ],
            [
                'nombre' => 'Teclado gamer Razer Huntsman mini Opto mecánico',
                'descripcion' => 'Alámbrico, conexión USB, luces Chroma RGB',
                'imagen' => 'https://coolboxpe.vtexassets.com/arquivos/ids/273012-200-200?v=638204481515300000&width=200&height=200&aspect=true',
                'precio' => 589.90,
            ],
            [
                'nombre' => 'Scooter eléctrico Roadtrip Cirkuit 3 8.5"',
                'descripcion' => 'Autonomía 25 km, vel. 25 km/h, 250w, carga de 3 horas',
                'imagen' => 'https://coolboxpe.vtexassets.com/arquivos/ids/410968-200-200?v=638719461746770000&width=200&height=200&aspect=true',
                'precio' => 999.90,
            ],
            [
                'nombre' => 'Cámara de acción GoPro Hero 13',
                'descripcion' => 'Black Bundle (Cámara de acción + Large Tube Mount)',
                'imagen' => 'https://coolboxpe.vtexassets.com/arquivos/ids/384374-200-200?v=638610694269000000&width=200&height=200&aspect=true',
                'precio' => 1789.90,
            ],
            [
                'nombre' => 'Audífonos bluetooth on ear JBL T720 Pure Bass micrófono incorporado',
                'descripcion' => 'Máx. 76 horas, control de música y llamadas, negro',
                'imagen' => 'https://coolboxpe.vtexassets.com/arquivos/ids/297706-200-200?v=638276316392670000&width=200&height=200&aspect=true',
                'precio' => 279.90,
            ],
        ];

        foreach ($productos as $producto) {
            DB::table('productos')->insert([
                'nombre' => $producto['nombre'],
                'descripcion' => $producto['descripcion'],
                'imagen' => $producto['imagen'],
                'precio' => $producto['precio'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
