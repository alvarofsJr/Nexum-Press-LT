<?php

return [
    'validation' => [
        'veiculo_required' => 'Você deve adicionar um veículo.',
        'motorista_required' => 'Você deve adicionar um motorista.',
        'data_embarque_required' => 'Informe a data de embarque.',
        'peso_required' => 'Informe o peso da carga (Kg).',
        'descricao_required' => 'Faça a descrição da carga.',
    ],
    'success' => [
        'store' => 'Carga foi adicionada com sucesso!',
        'update' => 'Carga atualizada com sucesso!',
        'delete' => 'Carga excluída com sucesso!',
    ],
    'error' => [
        'motorista_required' => 'Você deve adicionar um motorista.',
        'veiculo_required' => 'Você deve adicionar um veículo.',
        'descricao_max' => 'A descrição não pode ultrapassar 255 caracteres.',
    ],
];
