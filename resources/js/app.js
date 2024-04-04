import "./bootstrap";
import "./docsearch";
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import clipboard from "./clipboard.js";

Alpine.data('clipboard', clipboard)

Livewire.start()
