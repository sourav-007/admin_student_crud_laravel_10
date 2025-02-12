
@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white', 'dropdownClasses' => ''])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'start-0';
        break;
    case 'top':
        $alignmentClasses = 'top-0';
        break;
    case 'none':
    case 'false':
        $alignmentClasses = '';
        break;
    case 'right':
    default:
        $alignmentClasses = 'end-0';
        break;
}

@endphp


<div class="dropdown-container position-relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <div class="dropdown-trigger" @click="open = ! open">
       {{ $trigger }}
    </div>

    <div x-show="open" :class="{'show': open}" class="dropdown-menu position-absolute {{ $alignmentClasses }} {{ $dropdownClasses }}
        shadow-lg px-0 pt-2 pb-3 bg-white rounded-3" style="display: none; border:1px solid #e9ecef; width:11rem;" @click="open = false">
        <div class="dropdown-content {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>

