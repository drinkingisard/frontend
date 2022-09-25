$("#btn1").on("click", (event) => {
  $("div").animate(
    {
        'left': '500px'
    }, 1500, 'linear', () => {
        alert('end')
    }) 
});
$("#btn2").on("click", (event) => {
  $("p").slideDown("slow");
});

// $('#btn1').on('click', (event) => {
//     $("p").fadeOut("slow");
// })
// $('#btn2').on('click', (event) => {
//     $('p').fadeIn('slow')
// })

// $("#btn1").on("click", (event) => {
//   $("p").slideUp("slow");
// });
// $("#btn2").on("click", (event) => {
//   $("p").slideDown("slow");
// });

// $('#btn1').on('click', (event) => {
//     $('p').hide()
// })
// $('#btn2').on('click', (event) => {
//     $('p').show()
// })

// $('#btn1').on('click.event1', (event) => {
//     console.log('event1')
// })

// $('#btn1').on('click.event2', (event) => {
//     console.log('event2')
// })

// $('#btn2').on('click', () => {
//     $('#btn1').trigger('click.event1')
// })

// $('input').each((index, item) => {
//     $(item).val(index)
//     console.log($(item).val())
// })
