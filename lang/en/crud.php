<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'empresas' => [
        'name' => 'Empresas',
        'index_title' => 'Empresas List',
        'new_title' => 'New Empresa',
        'create_title' => 'Create Empresa',
        'edit_title' => 'Edit Empresa',
        'show_title' => 'Show Empresa',
        'inputs' => [
            'nome' => 'Nome',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'convenios' => [
        'name' => 'Convenios',
        'index_title' => 'Convenios List',
        'new_title' => 'New Convenio',
        'create_title' => 'Create Convenio',
        'edit_title' => 'Edit Convenio',
        'show_title' => 'Show Convenio',
        'inputs' => [
            'numero' => 'Numero',
            'objeto' => 'Objeto',
            'numero_processo' => 'Numero Processo',
            'valor_repasse' => 'Valor Repasse',
            'valor_contra_partida' => 'Valor Contra Partida',
            'valor_total' => 'Valor Total',
            'valor_liberado_concedente' => 'Valor Liberado Concedente',
            'valor_pago' => 'Valor Pago',
            'valor_liberado' => 'Valor Liberado',
            'virgencia_execucao' => 'Virgencia Execucao',
            'virgencia_contrato' => 'Virgencia Contrato',
            'contrato_id' => 'Contrato',
            'orgao_id' => 'Orgao',
        ],
    ],

    'aditivos' => [
        'name' => 'Aditivos',
        'index_title' => 'Aditivos List',
        'new_title' => 'New Aditivo',
        'create_title' => 'Create Aditivo',
        'edit_title' => 'Edit Aditivo',
        'show_title' => 'Show Aditivo',
        'inputs' => [
            'numero' => 'Numero',
            'tipo' => 'Tipo',
            'prazo' => 'Prazo',
        ],
    ],

    'orgaos' => [
        'name' => 'Orgaos',
        'index_title' => 'Orgaos List',
        'new_title' => 'New Orgao',
        'create_title' => 'Create Orgao',
        'edit_title' => 'Edit Orgao',
        'show_title' => 'Show Orgao',
        'inputs' => [
            'nome' => 'Nome',
            'esfera' => 'Esfera',
        ],
    ],

    'contratos' => [
        'name' => 'Contratos',
        'index_title' => 'Contratos List',
        'new_title' => 'New Contrato',
        'create_title' => 'Create Contrato',
        'edit_title' => 'Edit Contrato',
        'show_title' => 'Show Contrato',
        'inputs' => [
            'numero' => 'Numero',
            'numero_processo' => 'Numero Processo',
            'virgencia' => 'Virgencia',
            'virgencia_execucao' => 'Virgencia Execucao',
            'valor' => 'Valor',
            'modalidade' => 'Modalidade',
            'empresa_id' => 'Empresa',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
