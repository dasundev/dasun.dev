# 📌 Special Note
The Livewire dropzone component uploads files to Livewire's [temporary upload directory](https://livewire.laravel.com/docs/uploads#temporary-upload-directory). To permanently store them, manual action is required. This is where `wire:model` becomes essential. For example, take the `banners` model, which contains each upload as an array containing file paths. You can iterate through this array and store the files according to your preferences.