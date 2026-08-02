<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LegalController extends Controller
{
    public function terms(Request $request): View
    {
        return $this->render($request, 'terms');
    }

    public function privacy(Request $request): View
    {
        return $this->render($request, 'privacy');
    }

    public function cookies(Request $request): View
    {
        return $this->render($request, 'cookies');
    }

    private function render(Request $request, string $document): View
    {
        $lang = $request->query('lang') === 'en' ? 'en' : 'es';
        $copy = $this->copy()[$lang][$document];

        return view('legal', [
            'lang' => $lang,
            'copy' => $copy,
            'homeLabel' => $lang === 'en' ? 'Back to home' : 'Volver al inicio',
            'documentsLabel' => $lang === 'en' ? 'Legal documents' : 'Documentos legales',
        ]);
    }

    private function copy(): array
    {
        return [
            'es' => [
                'terms' => [
                    'title' => 'Términos y Condiciones de Uso',
                    'subtitle' => 'Bulkio',
                    'sections' => [
                        [
                            'heading' => 'Naturaleza del proyecto y descargo de responsabilidad',
                            'content' => [
                                'Bulkio es un proyecto comunitario, independiente y sin fines de lucro operado por una persona natural. Su objetivo es servir como un laboratorio de experimentación y creación de reglas alternativas para Juegos de Cartas Coleccionables (TCG).',
                                'Bulkio no está afiliado, endosado, patrocinado ni asociado de ninguna manera con Bandai Co., Ltd., Eiichiro Oda, Shueisha, ni con ninguna otra empresa propietaria de los TCG discutidos en este sitio. Las marcas registradas, nombres de juegos, personajes y artes gráficos mencionados en este sitio son propiedad exclusiva de sus respectivos dueños. Su uso en este sitio se realiza estrictamente bajo fines informativos, de crítica, educativos y recreativos (Uso Fan).',
                            ],
                        ],
                        [
                            'heading' => 'Uso del sitio y del foro',
                            'content' => [
                                'El usuario se compromete a hacer un uso adecuado del foro y blog. Queda estrictamente prohibido:',
                            ],
                            'list' => [
                                'Publicar contenido ofensivo, difamatorio, ilegal o que vulnere derechos de terceros.',
                                'Promover la venta, distribución o piratería de material con derechos de autor (como copias ilegales de cartas oficiales).',
                                'Realizar actividades comerciales o SPAM sin autorización expresa de la administración.',
                            ],
                        ],
                        [
                            'heading' => 'Propiedad intelectual de la comunidad',
                            'content' => [
                                'Las reglas alternativas, variantes de juego y discusiones creadas por los usuarios en el foro se consideran de acceso público para la comunidad. Al publicar contenido en Bulkio, otorgas al Sitio una licencia gratuita e indefinida para mostrar y difundir dicho contenido dentro de la plataforma.',
                            ],
                        ],
                        [
                            'heading' => 'Limitación de responsabilidad',
                            'content' => [
                                'Bulkio no garantiza la disponibilidad ininterrumpida del sitio ni se hace responsable por las opiniones vertidas por los usuarios en los foros o secciones de comentarios.',
                            ],
                        ],
                        [
                            'heading' => 'Modificaciones',
                            'content' => [
                                'Nos reservamos el derecho de modificar estos términos en cualquier momento para adaptarlos a cambios legales o del proyecto.',
                            ],
                        ],
                    ],
                ],
                'privacy' => [
                    'title' => 'Política de Privacidad',
                    'subtitle' => 'Bulkio',
                    'sections' => [
                        [
                            'heading' => 'Datos que recopilamos',
                            'content' => [
                                'Para participar en el foro o comentar en el blog, es necesario crear una cuenta. Recopilamos únicamente:',
                            ],
                            'list' => [
                                'Nombre de usuario (puede ser un pseudónimo).',
                                'Dirección de correo electrónico.',
                                'Contraseña (almacenada de forma encriptada).',
                                'Datos de navegación básicos (dirección IP de forma temporal para evitar SPAM).',
                            ],
                        ],
                        [
                            'heading' => 'Uso de los datos',
                            'content' => [
                                'Los datos recopilados se utilizan exclusivamente para:',
                            ],
                            'list' => [
                                'Gestionar tu cuenta de usuario y permitir el acceso al foro.',
                                'Enviar notificaciones del sistema o de la comunidad (puedes desactivarlas en tu perfil).',
                                'Moderar la comunidad y mantener la seguridad del sitio.',
                                'Bulkio no vende, alquila ni comparte tus datos personales con terceras empresas ni los utiliza para fines publicitarios o comerciales.',
                            ],
                        ],
                        [
                            'heading' => 'Seguridad de los datos',
                            'content' => [
                                'Implementamos medidas técnicas estándar (como cifrado SSL y contraseñas hasheadas) para proteger tus datos contra accesos no autorizados.',
                            ],
                        ],
                        [
                            'heading' => 'Derechos del usuario',
                            'content' => [
                                'Tienes derecho a acceder, rectificar o eliminar tus datos personales en cualquier momento. Puedes cerrar tu cuenta y borrar tu información directamente desde el panel de usuario del foro o enviando un mensaje a la administración a: contacto@bulkio.com.',
                            ],
                        ],
                        [
                            'heading' => 'Enlaces a terceros',
                            'content' => [
                                'Nuestro sitio puede contener enlaces a redes sociales o plataformas externas. No nos hacemos responsables de las políticas de privacidad de dichos sitios de terceros.',
                            ],
                        ],
                    ],
                ],
                'cookies' => [
                    'title' => 'Política de Cookies',
                    'subtitle' => 'Bulkio',
                    'sections' => [
                        [
                            'heading' => 'Uso de cookies',
                            'content' => [
                                'Bulkio utiliza cookies técnicas y esenciales para el correcto funcionamiento del Sitio.',
                            ],
                        ],
                        [
                            'heading' => '¿Qué son las cookies?',
                            'content' => [
                                'Son pequeños archivos de texto que se guardan en tu navegador.',
                            ],
                        ],
                        [
                            'heading' => '¿Para qué las usamos?',
                            'content' => [
                                'Exclusivamente para mantener tu sesión iniciada en el foro, recordar tus preferencias estéticas (como el modo oscuro) y garantizar la seguridad del sitio contra ataques informáticos.',
                            ],
                        ],
                        [
                            'heading' => 'Cookies de terceros',
                            'content' => [
                                'Si integramos herramientas de análisis básicas (como analíticas sin seguimiento invasivo) o widgets de redes sociales, estos pueden usar sus propias cookies.',
                            ],
                        ],
                        [
                            'heading' => 'Gestión de cookies',
                            'content' => [
                                'Puedes desactivar las cookies en la configuración de tu navegador, aunque esto podría afectar la experiencia de uso y navegación en nuestro foro.',
                            ],
                        ],
                    ],
                ],
            ],
            'en' => [
                'terms' => [
                    'title' => 'Terms and Conditions of Use',
                    'subtitle' => 'Bulkio',
                    'sections' => [
                        [
                            'heading' => 'Project nature and disclaimer',
                            'content' => [
                                'Bulkio is a community-driven, independent, non-profit project operated by a natural person. Its purpose is to serve as a laboratory for experimentation and for creating alternative rules for Trading Card Games (TCG).',
                                'Bulkio is not affiliated with, endorsed by, sponsored by, or associated in any way with Bandai Co., Ltd., Eiichiro Oda, Shueisha, or any other company that owns the TCGs discussed on this site. The trademarks, game names, characters, and artwork mentioned on this site are the exclusive property of their respective owners. Their use on this site is strictly for informational, critical, educational, and recreational purposes (fan use).',
                            ],
                        ],
                        [
                            'heading' => 'Use of the site and forum',
                            'content' => [
                                'Users agree to use the forum and blog appropriately. The following is strictly prohibited:',
                            ],
                            'list' => [
                                'Posting offensive, defamatory, illegal, or third-party rights-infringing content.',
                                'Promoting the sale, distribution, or piracy of copyrighted material (such as illegal copies of official cards).',
                                'Engaging in commercial activity or spam without explicit authorization from the administration.',
                            ],
                        ],
                        [
                            'heading' => 'Community intellectual property',
                            'content' => [
                                'Alternative rules, gameplay variants, and discussions created by users in the forum are considered publicly accessible to the community. By publishing content on Bulkio, you grant the Site a free, perpetual license to display and distribute that content within the platform.',
                            ],
                        ],
                        [
                            'heading' => 'Limitation of liability',
                            'content' => [
                                'Bulkio does not guarantee uninterrupted availability of the site and is not responsible for opinions expressed by users in forums or comment sections.',
                            ],
                        ],
                        [
                            'heading' => 'Changes',
                            'content' => [
                                'We reserve the right to modify these terms at any time to reflect legal or project-related changes.',
                            ],
                        ],
                    ],
                ],
                'privacy' => [
                    'title' => 'Privacy Policy',
                    'subtitle' => 'Bulkio',
                    'sections' => [
                        [
                            'heading' => 'Data we collect',
                            'content' => [
                                'To participate in the forum or comment on the blog, you must create an account. We only collect:',
                            ],
                            'list' => [
                                'Username (which may be a pseudonym).',
                                'Email address.',
                                'Password (stored in encrypted form).',
                                'Basic browsing data (temporary IP address to prevent spam).',
                            ],
                        ],
                        [
                            'heading' => 'How we use data',
                            'content' => [
                                'The data collected is used exclusively to:',
                            ],
                            'list' => [
                                'Manage your user account and allow access to the forum.',
                                'Send system or community notifications (you can disable them in your profile).',
                                'Moderate the community and keep the site secure.',
                                'Bulkio does not sell, rent, or share your personal data with third parties, nor does it use it for advertising or commercial purposes.',
                            ],
                        ],
                        [
                            'heading' => 'Data security',
                            'content' => [
                                'We implement standard technical measures (such as SSL encryption and hashed passwords) to protect your data from unauthorized access.',
                            ],
                        ],
                        [
                            'heading' => 'User rights',
                            'content' => [
                                'You have the right to access, rectify, or delete your personal data at any time. You can close your account and delete your information directly from the forum user panel or by sending a message to the administration at: contacto@bulkio.com.',
                            ],
                        ],
                        [
                            'heading' => 'Third-party links',
                            'content' => [
                                'Our site may contain links to social networks or external platforms. We are not responsible for the privacy policies of those third-party sites.',
                            ],
                        ],
                    ],
                ],
                'cookies' => [
                    'title' => 'Cookie Policy',
                    'subtitle' => 'Bulkio',
                    'sections' => [
                        [
                            'heading' => 'Cookie usage',
                            'content' => [
                                'Bulkio uses technical and essential cookies for the proper functioning of the Site.',
                            ],
                        ],
                        [
                            'heading' => 'What are cookies?',
                            'content' => [
                                'They are small text files stored in your browser.',
                            ],
                        ],
                        [
                            'heading' => 'What do we use them for?',
                            'content' => [
                                'Exclusively to keep your forum session active, remember your aesthetic preferences (such as dark mode), and ensure site security against attacks.',
                            ],
                        ],
                        [
                            'heading' => 'Third-party cookies',
                            'content' => [
                                'If we integrate basic analytics tools (such as non-invasive analytics) or social media widgets, they may use their own cookies.',
                            ],
                        ],
                        [
                            'heading' => 'Managing cookies',
                            'content' => [
                                'You can disable cookies in your browser settings, although this may affect the browsing experience on our forum.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
