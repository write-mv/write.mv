<div class="mt-2 bg-white rounded dark:bg-gray-300" wire:ignore>
  <div id="toolbar-container">
    <span class="ql-formats">
      <select class="ql-font">
        <option value="faseyha">MvFaseyha</option>
        <option value="waheed">MvWaheed</option>
        <option value="aammu">MvAammu</option>
        <option value="typer">MvTyper</option>
        <option value="opensans">Open Sans</option>
        <option value="roboto">Roboto</option>
      </select>
      <select class="ql-size"></select>
    </span>
    <span class="ql-formats">
      <button class="ql-bold"></button>
      <button class="ql-italic"></button>
      <button class="ql-underline"></button>
    </span>
    <span class="ql-formats">
      <select class="ql-color"></select>
    </span>
   
    <span class="ql-formats">
      <button class="ql-header" value="1"></button>
      <button class="ql-header" value="2"></button>
      <button class="ql-blockquote"></button>
      <!--<button class="ql-code-block"></button> -->
    </span>
    <span class="ql-formats">
      <button class="ql-list" value="ordered"></button>
      <button class="ql-list" value="bullet"></button>
      <button class="ql-indent" value="-1"></button>
      <button class="ql-indent" value="+1"></button>
    </span>
    <span class="ql-formats">
      <button class="ql-direction" value="rtl"></button>
      <select class="ql-align"></select>
    </span>
    <span class="ql-formats">
      <button class="ql-link"></button>
      <button class="ql-video"></button>
      <button class="ql-formula"></button>
    </span>
  </div>
    <div
      class="text-md"
      style="height: 375px; font-size: 15px;"
      x-data
      x-ref="quillEditor"
      x-init="
      Font = Quill.import('formats/font');
      Font.whitelist = ['faseyha', 'waheed', 'aammu','typer', 'opensans','roboto'];
      Quill.register(Font, true);
        quill = new Quill($refs.quillEditor, {
          theme: 'snow',
          modules: {
            syntax: false,
            toolbar: '#toolbar-container'
          },
        });
       quill.setContents(@this.get('{{$attributes['wire:model']}}'));
        quill.on('text-change', function () {
          $dispatch('quill-input', quill.getContents());
        });
      "
      x-on:quill-input.debounce.2000ms="@this.set('{{$attributes['wire:model']}}', $event.detail)"
    >
    </div>
  </div>