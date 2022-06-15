# Trov Components

:bangbang: This package is being deprecated. New version can be found at [Filament Addons](https://github.com/awcodes/filament-addons)

A set of components, fields and layouts to extend Filament Admin.

Used by [Trov CMS](https://github.com/awcodes/trov).

## Admin

### **Fixed Sidebar Layout**

Just return it directly from your form function in your model resource.

```php
public static function form(Form $form): Form
{
    return FixedSidebar::make()
        ->schema([
            // Main section form components
        ], [
            // Sidebar form components
        ]);
}
```

### Multi Action Button

Usage:

Publish necessary views

```bash
php artisan trov-components:make-multi-action-button
```

Add the following to either Your EditPage or CreatePage resources, or both. And the view will take care of the rest.

```php
protected bool $hasMultiActionButton = true;
```

## Forms

### **Date Input**

![date input](images/date-input.png)

```php
DateInput::make(string $fieldname)
    ->label('Publish Date')
    ->withoutTime() //optional
```

### **Password Generator**

![password generator](images/password-generator.png)

All methods from TextInput are available.

```php
PasswordGenerator::make(string $fieldname)
    ->passwordLength(int $length = 12)
    ->hasNumbers(bool $hasNumbers = true)
    ->hasSymbols(bool $hasSymbols = true)
```

### **Title With Slug**

![title with slug](images/title-with-slug.png) ![title with slug open](images/title-with-slug-open.png)

Creates a TextInput with the ability to modify the slug after creation, but preserves the slug when editing to help with SEO.

```php
TitleWithSlug::make(
    string $titleFieldName = 'title',
    string $slugFieldName = 'slug',
    string|Closure $basePathForResource = '/'
)->columnSpan('full')
```

### **Separator**

Just outputs a sensible hr to help separate components.

```php
Separator::make()
```

### **Timestamps**

Outputs Created At and Updated At information blocks.

```php
Timestamps::make()
```

### **Video Embed**

![video-embed](images/video-embed.png)

Allows embeded code with preview. This field does not sanitize your values. You are responsible for purifying any raw html input or output.

Supports most of the Textarea field's options.

```php
VideoEmbed::make(string $fieldname)
    ->label('label')
    ->rows()
```

## Tables

### **Title With Status Indicator**

![title with status](images/title-with-status.png)

```php
TitleWithStatus::make(string $fieldname = 'title')
    ->statusField(string $fieldname = 'status') // optional
    ->statuses(array | Arrayable (Enum) Status::class)
    ->colors(array | Arrayable (Enum) Status::colors())
    ->hiddenOn(string | null Status::Published->name) //optional
```

### **Soft Delete Filter**

Require that your model and resources are setup for Soft Deletes. This might become obsolete if Filament impliments their own way of handling Soft Deletes.

```php
SoftDeleteFilter::make()
```
