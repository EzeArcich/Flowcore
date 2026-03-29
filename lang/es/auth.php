<?php

return [
    'modal' => [
        'toggle' => [
            'login' => 'Iniciar sesión',
            'register' => 'Crear cuenta',
        ],
        'login' => [
            'kicker' => 'Qué bueno verte de nuevo',
            'title' => 'Iniciá sesión para mantener cada oportunidad en movimiento.',
            'description' => 'Retomá tu pipeline donde lo dejaste, con contexto, acciones pendientes y seguimientos por vencer listos para continuar.',
            'fieldsets' => [
                'credentials' => 'Credenciales',
            ],
            'resume_faster' => 'Volvé más rápido en este dispositivo.',
            'alt_action' => [
                'prompt' => '¿Necesitás una cuenta?',
                'cta' => 'Ir a registro',
            ],
        ],
        'register' => [
            'kicker' => 'Creá tu espacio',
            'title' => 'Empezá a gestionar tu pipeline con estructura.',
            'description' => 'Creá una cuenta para gestionar empresas, contactos, cotizaciones y seguimientos dentro de un flujo claro.',
            'fieldsets' => [
                'profile' => 'Perfil',
                'security' => 'Seguridad',
            ],
            'submit' => 'Crear cuenta',
            'alt_action' => [
                'prompt' => '¿Ya tenés una cuenta?',
                'cta' => 'Ir a login',
            ],
        ],
    ],
    'layout' => [
        'nav' => [
            'home' => 'Volver al sitio',
        ],
        'floaters' => [
            'deal' => [
                'meta' => 'estado: esperando respuesta',
            ],
            'note' => [
                'label' => 'Nota',
                'meta' => 'solicitado por stakeholder',
            ],
            'ambient' => [
                'orbit_studio' => [
                    'meta' => 'industria: design systems',
                ],
                'retainer' => [
                    'meta' => 'etapa: enviada ayer',
                ],
                'follow_up' => [
                    'title' => 'Llamar a las 16:30',
                ],
                'interaction' => [
                    'meta' => 'última actualización: hace 2 h',
                ],
            ],
        ],
        'showcase' => [
            'tagline' => 'Flowcore es donde los pipelines avanzan',
            'login' => [
                'title' => 'Retomá el hilo y mantené cada oportunidad en movimiento.',
                'copy' => 'Flowcore te ayuda a mantener contexto visible, definir el próximo paso con claridad y sostener el avance real de cada oportunidad.',
            ],
            'register' => [
                'title' => 'Creá una cuenta y empezá a gestionar seguimientos con estructura.',
                'copy' => 'Flowcore mantiene empresas, contactos, oportunidades y próximos pasos conectados para que operes con foco y seguimiento real.',
            ],
            'points' => [
                'connected' => 'Empresas, contactos y conversaciones permanecen conectados.',
                'due_dates' => 'Las fechas de vencimiento convierten intención en ejecución visible.',
                'workflow' => 'Un flujo claro pensado para el seguimiento comercial real.',
            ],
        ],
        'board' => [
            'today' => 'Hoy',
            'follow_ups_due_now' => 'Seguimientos que vencen ahora',
            'tasks' => [
                'acme_logistics' => [
                    'copy' => 'Propuesta enviada, respuesta esperada para esta tarde.',
                ],
                'northstar_retail' => [
                    'copy' => 'El decision maker pidió una cotización revisada.',
                ],
            ],
            'pipeline_metric' => 'oportunidades activas',
            'execution' => 'Ejecución',
            'execution_metric' => 'seguimientos a tiempo',
        ],
        'footer' => [
            'back_to_product_overview' => 'Volver al sitio',
        ],
    ],
    'pages' => [
        'login' => [
            'header' => [
                'title' => 'Iniciá sesión para mantener cada oportunidad en movimiento.',
                'description' => 'Retomá tu pipeline donde lo dejaste, con cada próximo paso y conversación visibles.',
            ],
            'note' => [
                'label' => 'Dentro de Flowcore',
                'copy' => 'Tus prioridades de hoy, seguimientos vencidos y contexto del pipeline quedan listos apenas entrás.',
            ],
            'facts' => [
                'daily_focus' => [
                    'label' => 'Foco diario',
                    'copy' => 'Entrá a Flowcore y sabé exactamente qué necesita atención ahora.',
                ],
                'context' => [
                    'label' => 'Contexto preservado',
                    'copy' => 'Conversaciones, cotizaciones y próximas acciones permanecen conectadas.',
                ],
            ],
        ],
        'register' => [
            'header' => [
                'title' => 'Crear una cuenta',
                'description' => 'Configurá Flowcore y empezá a gestionar empresas, oportunidades y próximos pasos dentro de un flujo claro.',
            ],
            'note' => [
                'label' => 'Lo que obtenés',
                'copy' => 'Un espacio comercial con próximos pasos visibles, historial de interacciones y menos oportunidades perdidas.',
            ],
            'facts' => [
                'ownership' => [
                    'label' => 'Base propia',
                    'copy' => 'Tu pipeline, tus datos y tu forma de operar quedan listos desde el primer día.',
                ],
                'execution' => [
                    'label' => 'Hecho para ejecutar',
                    'copy' => 'Diseñado para equipos que necesitan claridad, no burocracia de CRM.',
                ],
            ],
        ],
    ],
];
