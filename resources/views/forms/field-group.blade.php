<div {!! $getId() ? "id=\"{$getId()}\"" : null !!}
    {{ $attributes->merge($getExtraAttributes())->class(['trov-components-forms-field-group-component', 'dark:text-gray-200' => config('forms.dark_mode')]) }}>
    {{ $getChildComponentContainer() }}
</div>
