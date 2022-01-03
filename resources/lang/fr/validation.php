<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Le :attribut doit être accepté.',
    'active_url'           => 'Le :attribut n est pas une URL valide.',
    'after'                => 'Le :attribut doit être une date après: date.',
    'after_or_equal'       => 'Le :attribut doit être une date postérieure ou égale à: date.',
    'alpha'                => 'Le :attribut ne peut contenir que des lettres.',
    'alpha_dash'           => 'Le :attribut ne peut contenir que des lettres, des chiffres et des tirets.',
    'alpha_num'            => 'Le :attribut ne peut contenir que des lettres et des chiffres.',
    'array'                => 'Le :attribut doit être un tableau.',
    'before'               => 'Le :attribut doit être une date antérieure à: date.',
    'before_or_equal'      => 'Le :attribut doit être une date antérieure ou égale à: date.',
    'between'              => [
        'numeric' => 'Le :attribut doit être compris entre: min et: max.',
        'file'    => 'Le :attribut doit être compris entre: min et: max kilo-octets.',
        'string'  => 'Le :attribut doit être compris entre: min et: max caractères.',
        'array'   => 'Le :attribut doit avoir entre: min et: max éléments.',
    ],
    'boolean'              => 'Le :champ d attribut doit être vrai ou faux.',
    'confirmed'            => 'La :confirmation de l attribut ne correspond pas.',
    'date'                 => 'Le :attribut n est pas une date valide.',
    'date_format'          => 'Le :attribut ne correspond pas au format: format.',
    'different'            => 'Le :attribut et l autre doivent être différents.',
    'digits'               => 'Le :attribut doit être: chiffres chiffres.',
    'digits_between'       => 'Le :attribut doit être compris entre: min et: max chiffres.',
    'dimensions'           => 'Le :attribut a des dimensions d image non valides.',
    'distinct'             => 'Le :champ d attribut a une valeur en double.',
    'email'                => 'Le :attribut doit être une adresse e-mail valide.',
    'exists'               => 'La sélection :attribut est invalide.',
    'file'                 => 'Le :attribut doit être un fichier.',
    'filled'               => 'Le :champ d attribut est obligatoire.',
    'image'                => 'Le :attribut doit être une image.',
    'in'                   => 'La sélection :attribut invalide.',
    'in_array'             => 'Le :champ d attribut n existe pas dans: autre.',
    'integer'              => 'Le :attribut doit être un entier.',
    'ip'                   => 'Le :attribut doit être une adresse IP valide.',
    'json'                 => 'Le :l attribut doit être une chaîne JSON valide.',
    'max'                  => [
        'numeric' => 'Le :attribut ne doit pas être supérieur à: max.',
        'file'    => 'Le :attribut ne doit pas être supérieur à: kilo-octets max.',
        'string'  => 'Le :attribut ne doit pas être supérieur à: caractères max.',
        'array'   => 'Le :l attribut ne peut pas avoir plus de: max éléments.',
    ],
    'mimes'                => 'Le :attribut doit être un fichier de type:: valeurs.',
    'mimetypes'            => 'Le :attribut doit être un fichier de type:: valeurs.',
    'min'                  => [
        'numeric' => 'Le :attribut doit être au moins: min.',
        'file'    => 'Le :attribut doit être au moins: min kilo-octets.',
        'string'  => 'Le :attribut doit être au moins: min caractères.',
        'array'   => 'Le :attribut doit avoir au moins: min éléments.',
    ],
    'not_in'               => 'La sélection :attribut est invalid.',
    'numeric'              => 'Le  :attribut doit être un nombre.',
    'present'              => 'Le  :champ d attribut doit être présent.',
    'regex'                => 'Le  :format d attribut n est pas valide.',
    'required'             => 'Le  :le champ d attribut est obligatoire.',
    'required_if'          => 'Le  :champ d attribut est obligatoire lorsque: autre est: valeur.',
    'required_unless'      => 'Le  :champ d attribut est obligatoire sauf si: autre est dans: valeurs.',
    'required_with'        => 'Le  :champ dattribut est obligatoire lorsque: des valeurs sont présentes.',
    'required_with_all'    => 'Le  :champ d attribut est obligatoire lorsque: des valeurs sont présentes',
    'required_without'     => 'Le  :le champ d attribut est obligatoire lorsque: aucune valeur n est présente.',
    'required_without_all' => 'Le  :champ d attribut est obligatoire lorsqu aucune des: valeurs n est présente.',
    'same'                 => 'Le  :attribut et: autre doit correspondre.',
    'size'                 => [
        'numeric' => 'Le :attribut doit être: taille.',
        'file'    => 'Le :attribut doit être: taille kilo-octets.',
        'string'  => 'Le :attribut doit être: taille des caractères.',
        'array'   => 'Le :attribut doit contenir: les éléments de taille.',
    ],
    'string'               => 'Le :attribut doit être une chaîne.',
    'timezone'             => 'Le :attribut doit être une zone valide.',
    'unique'               => 'Le :attribut a déjà été pris.',
    'uploaded'             => 'Le :attribut n a pas pu être téléchargé.',
    'url'                  => 'Le :format d attribut n est pas valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        's_latitude' => [
            'required' => 'Adresse source requise',
        ],
        'd_latitude' => [
            'required' => 'Adresse de destination requise',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
