<x-forms::field-wrapper :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()">
    <div @class([
        'border rounded-lg',
        'dark:border-gray-600 dark:text-white' => config('forms.dark_mode'),
    ])>
        @if ($getState() != '')
            <div class="p-4">
                <h3 class="text-base">Preview</h3>
                <div class="flex justify-center mt-2">
                    {!! $getState() !!}
                </div>
            </div>
        @endif
        <textarea {!! ($autocapitalize = $getAutocapitalize()) ? "autocapitalize=\"{$autocapitalize}\"" : null !!}
            {!! ($autocomplete = $getAutocomplete()) ? "autocomplete=\"{$autocomplete}\"" : null !!}
            {!! $isAutofocused() ? 'autofocus' : null !!}
            {!! ($cols = $getCols()) ? "cols=\"{$cols}\"" : null !!}
            {!! $isDisabled() ? 'disabled' : null !!}
            id="{{ $getId() }}"
            dusk="filament.forms.{{ $getStatePath() }}"
            {!! filled($length = $getMaxLength()) ? "maxlength=\"{$length}\"" : null !!}
            {!! filled($length = $getMinLength()) ? "minlength=\"{$length}\"" : null !!}
            {!! ($placeholder = $getPlaceholder()) ? "placeholder=\"{$placeholder}\"" : null !!}
            {!! $isRequired() ? 'required' : null !!}
            {!! ($rows = $getRows()) ? "rows=\"{$rows}\"" : null !!}
            {{ $applyStateBindingModifiers('wire:model') }}="{{ $getStatePath() }}"
            {{ $attributes->merge($getExtraAttributes())->merge($getExtraInputAttributeBag()->getAttributes())->class([
                    'block w-full transition duration-75 rounded-lg shadow-sm -m-px focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-600 filament-forms-textarea-component',
                    'dark:bg-gray-700 dark:border-gray-600 dark:text-white' => config('forms.dark_mode'),
                    'border-gray-300' => !$errors->has($getStatePath()),
                    'border-danger-600 ring-danger-600' => $errors->has($getStatePath()),
                ]) }}
            @if ($shouldAutosize()) x-data="textareaFormComponent()"
                x-on:input="render()"
                style="height: 150px"
                {{ $getExtraAlpineAttributeBag() }} @endif>
        </textarea>
    </div>
    <p class="text-xs">Paste entire embed code into this field.</p>
</x-forms::field-wrapper>
