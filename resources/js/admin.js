//Common configs
//Data Table Configs
let dataTableLanguage = {
  search: "Procurar",
  lengthMenu:     "Mostrar _MENU_",
  decimal:        ",",
  thousands:      " ",
  info:           "Mostrando _START_ a _END_ de _TOTAL_",
  infoEmpty:      "Mostrando 0 a 0 de 0",
  infoFiltered:   "(Filtrado de _MAX_ registros)",
  paginate: {
    first:      "Primeiro",
    last:       "Último",
    next:       "Próximo",
    previous:   "Anterior"
  },
  zeroRecords:    "Nenhum resultado encontrado",
}

//Ckeditor Configs
let ckeditorConfig = {
  language: 'pt-br',
  toolbar: {
    shouldNotGroupWhenFull: true,
    items: [
      'heading',
      '|',
      'fontColor',
      'fontSize',
      'fontBackgroundColor',
      'fontFamily',
      '|',
      'bold',
      'italic',
      'underline',
      'strikethrough',
      'removeFormat',
      'link',
      'bulletedList',
      'numberedList',
      '|',
      'alignment',
      'horizontalLine',
      'outdent',
      'indent',
      '|',
      'blockQuote',
      'insertTable',
      'mediaEmbed',
      'undo',
      'redo'
    ]
  },
  image: {
    toolbar: [
      'imageTextAlternative',
      'imageStyle:full',
      'imageStyle:side',
      'linkImage'
    ]
  },
  table: {
    contentToolbar: [
      'tableColumn',
      'tableRow',
      'mergeTableCells',
      'tableCellProperties',
      'tableProperties'
    ]
  }
}