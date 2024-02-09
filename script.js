const uniModal = document.getElementById('uniModal')
const loaderHTML = `<div id="pre-loader"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div><div>`
const flashdataHTML = document.createElement('div');
       flashdataHTML.classList.add('flashdata')
       flashdataHTML.classList.add('mb-3')
       flashdataHTML.innerHTML = `<div class="d-flex w-100 align-items-center flex-wrap">
           <div class="col-11 flashdata-msg"></div>
           <div class="col-1 text-center">
               <a href="javascript:void(0)" onclick="this.closest('.flashdata').remove()" class="flashdata-close"><i class="far fa-times-circle"></i></a>
           </div>
       </div>`;
function start_loader(){
    if($('#pre-loader').length > 0)
        $('#pre-loader').remove()
    $('body').prepend(loaderHTML)
    $('body, html').css('overflow', 'hidden')
}