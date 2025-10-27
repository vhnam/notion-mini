# Alert Component Documentation

A Shadcn-inspired Alert component system for Laravel Blade templates.

## Components

The Alert system consists of three composable components:

- **`<x-ui.alert>`** - Main container wrapper
- **`<x-ui.alert-title>`** - Header text for the alert
- **`<x-ui.alert-description>`** - Supporting content/body text

## Installation

The components are already created in:
- `resources/views/components/ui/alert.blade.php`
- `resources/views/components/ui/alert-title.blade.php`
- `resources/views/components/ui/alert-description.blade.php`

## Basic Usage

```blade
<x-ui.alert>
    <x-ui.alert-title>Heads up!</x-ui.alert-title>
    <x-ui.alert-description>
        You can add components to your app using the cli.
    </x-ui.alert-description>
</x-ui.alert>
```

## Variants

The Alert component supports 5 variants:

### Default (Gray)
```blade
<x-ui.alert variant="default">
    <x-ui.alert-title>Information</x-ui.alert-title>
    <x-ui.alert-description>This is a default alert.</x-ui.alert-description>
</x-ui.alert>
```

### Destructive (Red)
```blade
<x-ui.alert variant="destructive">
    <x-ui.alert-title>Error</x-ui.alert-title>
    <x-ui.alert-description>Your session has expired.</x-ui.alert-description>
</x-ui.alert>
```

### Success (Green)
```blade
<x-ui.alert variant="success">
    <x-ui.alert-title>Success!</x-ui.alert-title>
    <x-ui.alert-description>Your changes have been saved.</x-ui.alert-description>
</x-ui.alert>
```

### Warning (Yellow)
```blade
<x-ui.alert variant="warning">
    <x-ui.alert-title>Warning</x-ui.alert-title>
    <x-ui.alert-description>This action cannot be undone.</x-ui.alert-description>
</x-ui.alert>
```

### Info (Blue)
```blade
<x-ui.alert variant="info">
    <x-ui.alert-title>Did you know?</x-ui.alert-title>
    <x-ui.alert-description>You can customize your dashboard.</x-ui.alert-description>
</x-ui.alert>
```

## Props

### Alert Component Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | `'default'` | Visual style: `default`, `destructive`, `success`, `warning`, `info` |
| `icon` | string\|bool\|null | Auto | Icon to display. Pass `false` to hide icon, or icon name to customize |

### AlertTitle Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `as` | string | `'h5'` | HTML tag to render (e.g., `h1`, `h2`, `h3`, `h4`, `h5`, `h6`) |

## Advanced Usage

### Without Icon
```blade
<x-ui.alert :icon="false">
    <x-ui.alert-title>Simple Alert</x-ui.alert-title>
    <x-ui.alert-description>This alert has no icon.</x-ui.alert-description>
</x-ui.alert>
```

### Title Only
```blade
<x-ui.alert variant="success">
    <x-ui.alert-title>Payment received!</x-ui.alert-title>
</x-ui.alert>
```

### Description Only
```blade
<x-ui.alert variant="info">
    <x-ui.alert-description>
        This is a simple informational message.
    </x-ui.alert-description>
</x-ui.alert>
```

### With Complex Content
```blade
<x-ui.alert variant="warning">
    <x-ui.alert-title>Important Update</x-ui.alert-title>
    <x-ui.alert-description>
        <p>Your application requires updates:</p>
        <ul class="list-disc list-inside mt-2 space-y-1">
            <li>Security patches</li>
            <li>New features</li>
            <li>Performance improvements</li>
        </ul>
    </x-ui.alert-description>
</x-ui.alert>
```

### Custom Heading Tag
```blade
<x-ui.alert>
    <x-ui.alert-title as="h3">Section Alert</x-ui.alert-title>
    <x-ui.alert-description>This uses an h3 tag.</x-ui.alert-description>
</x-ui.alert>
```

### Custom Classes
```blade
<x-ui.alert variant="default" class="border-2 shadow-lg">
    <x-ui.alert-title class="text-lg">Enhanced Alert</x-ui.alert-title>
    <x-ui.alert-description>
        With custom styling applied.
    </x-ui.alert-description>
</x-ui.alert>
```

## Integration with Laravel

### With Session Flash Messages
```blade
@if (session('success'))
    <x-ui.alert variant="success" class="mb-6">
        <x-ui.alert-title>Success!</x-ui.alert-title>
        <x-ui.alert-description>{{ session('success') }}</x-ui.alert-description>
    </x-ui.alert>
@endif

@if (session('error'))
    <x-ui.alert variant="destructive" class="mb-6">
        <x-ui.alert-title>Error</x-ui.alert-title>
        <x-ui.alert-description>{{ session('error') }}</x-ui.alert-description>
    </x-ui.alert>
@endif
```

### With Validation Errors
```blade
@if ($errors->any())
    <x-ui.alert variant="destructive" class="mb-6">
        <x-ui.alert-title>
            There {{ $errors->count() === 1 ? 'was' : 'were' }}
            {{ $errors->count() }} error(s) with your submission
        </x-ui.alert-title>
        <x-ui.alert-description>
            <ul class="list-disc list-inside mt-2 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-ui.alert-description>
    </x-ui.alert>
@endif
```

### In Controllers
```php
// Success message
return redirect()->route('dashboard')
    ->with('success', 'Your profile has been updated successfully.');

// Error message
return back()
    ->with('error', 'Unable to process your request. Please try again.');
```

## Icons

The component includes built-in icons for each variant:

- **default/info**: Information circle
- **destructive**: Exclamation triangle
- **success**: Check circle
- **warning**: Exclamation circle

Icons are automatically selected based on the variant. To hide icons, pass `:icon="false"`.

## Dark Mode Support

All variants include full dark mode support using Tailwind's dark mode classes. The components automatically adapt to your application's color scheme.

## Accessibility

- Uses semantic `role="alert"` attribute
- Proper heading hierarchy with customizable tags
- Screen reader friendly
- Keyboard navigable content

## Examples

View live examples in `resources/views/components/ui/alert-examples.blade.php`

To see the examples, create a route:

```php
Route::get('/alert-examples', function () {
    return view('components.ui.alert-examples');
});
```

## Styling

The components use Tailwind CSS and follow Shadcn's design principles:
- Clean, minimal aesthetic
- Consistent spacing and typography
- Full dark mode support
- Responsive design
- Accessible color contrasts

## Comparison with Flux Alert

If you're currently using Flux UI's `<flux:alert>`, you can migrate to these components:

**Before (Flux):**
```blade
<flux:alert variant="success">
    Your changes have been saved.
</flux:alert>
```

**After (Shadcn-inspired):**
```blade
<x-ui.alert variant="success">
    <x-ui.alert-description>
        Your changes have been saved.
    </x-ui.alert-description>
</x-ui.alert>
```

The new components offer more flexibility with separate title and description components, and follow Shadcn's composable pattern.
