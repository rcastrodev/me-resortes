<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        for ($i=0; $i <= 2; $i++) { 
            Content::create([
                'section_id' => 1,
                'order'     => 'AA',
                'image'     => 'images/home/Grupo_1000.png',
                'content_1' => 'MAS DE 25 AÑOS DEDICADOS A LA FABRICACION DE RESORTES Y ALAMBRES DE FORMA',
                'content_2' => 'Certificado de calidad ISO 9001'
            ]);
        }

        Content::create([
            'section_id'    => 2,
            'order'         => 'AA',
            'image'         => 'images/home/Enmascarar_grupo_754.png',
            'content_1'     => 'TENEMOS COMPROMISO DE CALIDAD CERTIFICADO ISO 9001 TÜV',
            'content_2'     => 'Los flujos de trabajo bien definidos contribuyen decisivamente a la calidad de sus productos o servicios. Una gestión eficaz de la calidad tiene en cuenta las necesidades y perspectivas específicas de su empresa. La norma ISO 9001 es un sistema de gestión de la calidad con especialmente enfoque orientado al proceso.',
            'content_4'     => 'images/home/5_C21.png',
        ]);

        Content::create([
            'section_id'    => 3,
            'image'         => '',
            'content_1'     => 'Para mayor información sobre nuestras máquinas, accedé al video a continuación',
            'content_2'     => '<iframe width="640" height="360" src="https://www.youtube.com/embed/6HIry-2FzP4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        ]);


        /** Fin home page */

        /** Empresa  */

        for ($i=0; $i < 5; $i++) { 
            Content::create([
                'section_id'    => 4,
                'order'         => 'AA',
                'image'         => 'images/company/Enmascarar_grupo_754.png',
            ]);
        }

        
        Content::create([
            'section_id'    => 5,
            'image' => 'images/company/Enmascarar_grupo_755.png',
            'content_1' => 'NUESTRA EMPRESA',
            'content_2' => '<p>Somos una empresa que opera desde 1994 abasteciendo al mercado industrial mediante la fabricación de resortes.</p>
            <p>Fundada por Escobar Cristaldo Sinforiano, con una experiencia de máss de 30 años en la rama de los resortes, M.E. Resortes tuvo desde sus comienzos un objetivo primordial, la satisfacción del cliente.</p>
            <p>Por tal motivo, contamos con maquinarias de última generación y un personal altamente capacitado y comprometido.</p>',
            'content_3'     => 'TENEMOS COMPROMISO DE CALIDAD',
            'content_4'     => '<p>TENEMOS COMPROMISO DE CALIDAD M.E. Resortes invierte y trabaja continuamente para optimizar sus productos y servicios para una mejor adaptaciónn a las cambiantes exigencias del mercado, como son; la flexibilidad, la rápida disponibilidad o el nivel de calidad constante.</p>
            <p>Es por ello que desde el año 2005, M.E. Resortes cuenta con el certificado de calidad bajo normas ISO 9001.</p>',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'AA',
            'image'         => 'images/applications/Enmascarar_grupo_541.png',
            'content_1'     => 'BOMBA DE COMBUSTIBLE',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'BB',
            'image'         => 'images/applications/Enmascarar_grupo_761.png',
            'content_1'     => 'CERRADURAS',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'CC',
            'image'         => 'images/applications/Enmascarar_grupo_540.png',
            'content_1'     => 'CERRADURAS PARA AUTOS',
        ]);

        Content::create([
            'section_id'    => 6,
            'order'         => 'DD',
            'image'         => 'images/applications/Enmascarar_grupo_543.png',
            'content_1'     => 'RESORTE CON FORMA',
        ]);
        Content::create([
            'section_id'    => 6,
            'order'         => 'EE',
            'image'         => 'images/applications/Enmascarar_grupo_544.png',
            'content_1'     => 'SEGURIDAD PARA ARNÉS',
        ]);
        Content::create([
            'section_id'    => 6,
            'order'         => 'FF',
            'image'         => 'images/applications/Enmascarar_grupo_545.png',
            'content_1'     => 'SEÑUELOS DE PESCA',
        ]);
        Content::create([
            'section_id'    => 6,
            'order'         => 'GG',
            'image'         => 'images/applications/Enmascarar_grupo_546.png',
            'content_1'     => 'SPOTS DE LUCES',
        ]);
        Content::create([
            'section_id'    => 6,
            'order'         => 'HH',
            'image'         => 'images/applications/Enmascarar_grupo_542.png',
            'content_1'     => 'VARIOS',
        ]);
        Content::create([
            'section_id'    => 6,
            'order'         => 'II',
            'image'         => 'images/applications/Enmascarar_grupo_759.png',
            'content_1'     => 'PORTALUCES',
        ]);
        Content::create([
            'section_id'    => 6,
            'order'         => 'JJ',
            'image'         => 'images/applications/Enmascarar_grupo_758.png',
            'content_1'     => 'ELECTRICIDAD',
        ]);
        Content::create([
            'section_id'    => 6,
            'order'         => 'KK',
            'image'         => 'images/applications/Enmascarar_grupo_762.png',
            'content_1'     => 'MARROQUINERÍA',
        ]);
        
        Content::create([
            'section_id' => 7,
            'order'     => 'AA',
            'image'     => 'images/applications/shoe.png',
            'content_1' => 'CALZADO',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'BB',
            'image'     => 'images/applications/tower.svg',
            'content_1' => 'ELECTRICIDAD',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'CC',
            'image'     => 'images/applications/candado.svg',
            'content_1' => 'CERRAJERÍA',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'DD',
            'image'     => 'images/applications/leather.svg',
            'content_1' => 'MARROQUINERÍA',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'EE',
            'image'     => 'images/applications/food-irradiation.svg',
            'content_1' => 'ALIMENTICIO',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'FF',
            'image'     => 'images/applications/colchon.svg',
            'content_1' => 'COLCHÓNERÍA',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'GG',
            'image'     => 'images/applications/lightbulb-solid.svg',
            'content_1' => 'ILUMINACIÓN',
        ]);

        Content::create([
            'section_id' => 7,
            'order'     => 'HH',
            'image'     => 'images/applications/coil.svg',
            'content_1' => 'COTILLÓN',
        ]);


        Content::create([
            'section_id' => 8,
            'order'     => 'AA',
            'image'     => '<iframe width="640" height="360" src="https://www.youtube.com/embed/6HIry-2FzP4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_1' => 'Ganchos',
            'content_2' => 'Fabricación de ganchos para pesca',
        ]);

        Content::create([
            'section_id' => 8,
            'order'     => 'BB',
            'image'     => '<iframe width="640" height="360" src="https://www.youtube.com/embed/6HIry-2FzP4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_1' => 'Resortes',
            'content_2' => 'Fabricación de resortes de tracción',
        ]);

        Content::create([
            'section_id' => 8,
            'order'     => 'CC',
            'image'     => '<iframe width="640" height="360" src="https://www.youtube.com/embed/6HIry-2FzP4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'content_1' => 'Resortes',
            'content_2' => 'Fabricación de resortes de torsión',
        ]);

        Content::create([
            'section_id'    => 9,
            'image'         => 'images/quality/Enmascarar_grupo_537.png',
            'content_1'     => 'POLÍTICAS DE CALIDAD',
            'content_2'     => '<p>M.E. Resortes es una empresa familiar dedicada a la fabricación de resortes por más de una década.</p><p>Producimos resortes para todo tipo de industria y de diferentes materiales (alambre de forma, flejes, acero inoxidable, etc.).</p><p>Sabemos que nuestros productos son de excelente calidad como consecuencia de un alto compromiso de la dirección, la concientización y capacidad de todo el personal. Nuestras premisas son:</p>',
        ]);
        
        Content::create([
            'section_id' => 10,
            'order'     => 'AA',
            'image'     => 'images/quality/target.svg',
            'content_1' => 'MEJORAR CONTINUAMENTE LOS PROCESOS',
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'BB',
            'image'     => 'images/quality/candado.svg',
            'content_1' => 'PROTEGER LA INTEGRIDAD DE LA INFORMACIÓN'
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'CC',
            'image'     => 'images/quality/balance-de-peso.svg',
            'content_1' => 'MANTENER UN ADECUADO BALANCE ENTRE COSTO Y BENEFICIO EN EL ANÁLISIS DE RIESGOS'
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'DD',
            'image'     => 'images/quality/team.svg',
            'content_1' => 'SATISFACER LOS REQUISITOS DE NUESTRAS PARTES INTERESADAS'
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'FF',
            'image'     => 'images/quality/surface1.svg',
            'content_1' => 'CONVERTIRNOS EN PROVEEDORES CALIFICADOS DE EMPRESAS NACIONALES'
        ]);

        Content::create([
            'section_id' => 10,
            'order'     => 'FF',
            'image'     => 'images/quality/project.svg',
            'content_1' => 'CONTAR CON PERSONAL ALTAMENTE CAPACITADO Y COMPROMETIDO'
        ]);

        Content::create([
            'section_id' => 11,
            'image'     => 'images/quality/5_C21.png',
            'content_1' => 'CERTIFICACIÓN ISO 9001 TÜV',
            'content_2' => '<p>M.E. Resortes invierte y trabaja continuamente para optimizar sus productos y servicios para una mejor adaptaciónn a las cambiantes exigencias del mercado, como son; la flexibilidad, la rápida disponibilidad o el nivel de calidad constante.</p><p>Es por ello que desde el año 2005, M.E. Resortes cuenta con el certificado de calidad bajo normas ISO 9001</p>'
        ]);

        Content::create([
            'section_id' => 12,
            'image'     => 'images/quality/dinamometro.png',
            'content_1' => 'DINAMÓMETRO',
            'content_2' => '<p>Contamos con un dinamómetro modelo LED3D-16H. Realizamos análisis de las características geométricas de resortes los resortes, mediciones inmediatas de perpendicularidad, paralelismo y paso para resortes cilíndricos, cónicos, rectificados o sin rectificar, de alambre redondo o rectangular.</p>'
        ]);

        Content::create([
            'section_id' => 12,
            'image'     => 'images/quality/LED2D-100H-600x337.png',
            'content_1' => 'PROYECTOR DE PERFILES',
            'content_2' => '<p>Contamos con un proyector para resortes con medición de dimensiones automática e inmediata. Ejecución automática de pruebas, gestión de archivos e impresión de datos.</p>'
        ]);
    }
}

    