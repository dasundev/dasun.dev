# 🎬 Usage
Now you can use the dropzone component as you like.
```html
<livewire:dropzone
        wire:model="banners"
        :rules="['image','mimes:png,jpeg','max:10420']"
        :multiple="true" />
```

> [!IMPORTANT]
> If you're using more than one dropzone component on the same page, make sure to include `wire:key` in the opening tag like this:

```html
<!-- Dropzone 1 -->
<livewire:dropzone
        wire:model="thumbnail"
        :rules="['image','mimes:png,jpeg','max:10420']"
        :key="'dropzone-one'" />

<!-- Dropzone 2 -->
<livewire:dropzone
        wire:model="files"
        :rules="['mimes:pdf,pptx,zip']"
        :multiple="true"
        :key="'dropzone-two'" />
```
