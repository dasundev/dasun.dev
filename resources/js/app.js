import "./bootstrap";
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import clipboard from "./clipboard.js";

import.meta.glob([
    '../images/**',
]);

Alpine.data('clipboard', clipboard)

Livewire.start()
