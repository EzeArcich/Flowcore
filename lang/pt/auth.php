<?php

return [
    'modal' => [
        'toggle' => [
            'login' => 'Entrar',
            'register' => 'Criar conta',
        ],
        'login' => [
            'kicker' => 'Que bom ver você de novo',
            'title' => 'Entre para manter cada oportunidade em movimento.',
            'description' => 'Retome seu pipeline com contexto, ações pendentes e follow-ups prontos para avançar.',
            'fieldsets' => [
                'credentials' => 'Credenciais',
            ],
            'resume_faster' => 'Volte mais rápido neste dispositivo.',
            'alt_action' => [
                'prompt' => 'Precisa de uma conta?',
                'cta' => 'Ir para cadastro',
            ],
        ],
        'register' => [
            'kicker' => 'Crie seu espaço',
            'title' => 'Comece a gerenciar seu pipeline com estrutura.',
            'description' => 'Crie uma conta para gerenciar empresas, contatos, propostas e follow-ups dentro de um fluxo claro.',
            'fieldsets' => [
                'profile' => 'Perfil',
                'security' => 'Segurança',
            ],
            'submit' => 'Criar conta',
            'alt_action' => [
                'prompt' => 'Já tem uma conta?',
                'cta' => 'Ir para login',
            ],
        ],
    ],
    'layout' => [
        'nav' => [
            'home' => 'Voltar ao site',
        ],
        'floaters' => [
            'deal' => [
                'meta' => 'status: aguardando resposta',
            ],
            'note' => [
                'label' => 'Nota',
                'meta' => 'solicitado por stakeholder',
            ],
            'ambient' => [
                'orbit_studio' => [
                    'meta' => 'indústria: design systems',
                ],
                'retainer' => [
                    'meta' => 'etapa: enviada ontem',
                ],
                'follow_up' => [
                    'title' => 'Ligação às 16:30',
                ],
                'interaction' => [
                    'meta' => 'última atualização: há 2 h',
                ],
            ],
        ],
        'showcase' => [
            'tagline' => 'Flowcore é onde os pipelines avançam',
            'login' => [
                'title' => 'Retome o fio e mantenha cada oportunidade em movimento.',
                'copy' => 'O Flowcore ajuda você a manter o contexto visível, definir o próximo passo com clareza e sustentar o avanço real de cada oportunidade.',
            ],
            'register' => [
                'title' => 'Crie uma conta e comece a gerenciar follow-ups com estrutura.',
                'copy' => 'O Flowcore mantém empresas, contatos, oportunidades e próximos passos conectados para que você opere com foco e acompanhamento real.',
            ],
            'points' => [
                'connected' => 'Empresas, contatos e conversas permanecem conectados.',
                'due_dates' => 'Os vencimentos transformam intenção em execução visível.',
                'workflow' => 'Um fluxo claro pensado para o acompanhamento comercial real.',
            ],
        ],
        'board' => [
            'today' => 'Hoje',
            'follow_ups_due_now' => 'Follow-ups vencendo agora',
            'tasks' => [
                'acme_logistics' => [
                    'copy' => 'Proposta enviada, resposta esperada para esta tarde.',
                ],
                'northstar_retail' => [
                    'copy' => 'O decision maker pediu uma cotação revisada.',
                ],
            ],
            'pipeline_metric' => 'oportunidades ativas',
            'execution' => 'Execução',
            'execution_metric' => 'follow-ups no prazo',
        ],
        'footer' => [
            'back_to_product_overview' => 'Voltar ao site',
        ],
    ],
    'pages' => [
        'login' => [
            'header' => [
                'title' => 'Entre para manter cada oportunidade em movimento.',
                'description' => 'Retome seu pipeline com cada próximo passo e conversa visíveis.',
            ],
            'note' => [
                'label' => 'Dentro do Flowcore',
                'copy' => 'Suas prioridades de hoje, follow-ups em atraso e contexto do pipeline ficam prontos assim que você entra.',
            ],
            'facts' => [
                'daily_focus' => [
                    'label' => 'Foco diário',
                    'copy' => 'Abra o Flowcore e veja exatamente o que precisa de atenção agora.',
                ],
                'context' => [
                    'label' => 'Contexto preservado',
                    'copy' => 'Conversas, propostas e próximas ações permanecem conectadas.',
                ],
            ],
        ],
        'register' => [
            'header' => [
                'title' => 'Criar uma conta',
                'description' => 'Configure o Flowcore e comece a gerenciar empresas, oportunidades e próximos passos dentro de um fluxo claro.',
            ],
            'note' => [
                'label' => 'O que você recebe',
                'copy' => 'Um espaço comercial com próximos passos visíveis, histórico de interações e menos oportunidades perdidas.',
            ],
            'facts' => [
                'ownership' => [
                    'label' => 'Base própria',
                    'copy' => 'Seu pipeline, seus dados e seu ritmo de operação ficam prontos desde o primeiro dia.',
                ],
                'execution' => [
                    'label' => 'Feito para executar',
                    'copy' => 'Pensado para equipes que precisam de clareza, não de burocracia de CRM.',
                ],
            ],
        ],
    ],
];
