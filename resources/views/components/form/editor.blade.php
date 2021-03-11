@props([
'model' => '',
'direction' => 'rtl',
'align' => 'right'
])

<div class="mt-2 bg-white" wire:ignore>
    <div
      class="para-dhivehi text-md"
      style="height: 375px; font-size: 15px;"
      x-data
      x-ref="quillEditor"
      x-init="
        quill = new Quill($refs.quillEditor, {theme: 'snow'});
        quill.on('text-change', function () {
          $dispatch('quill-input', quill.getContents());
        });
        quill.format('direction', '{{$direction}}');
        quill.format('align', '{{$align}}');
      "
      x-on:quill-input.debounce.2000ms="@this.set('{{$model}}', $event.detail)"
    >
     
    </div>
  </div>