$(document).ready(function(){

        $(".photo_form").css("visibility", "visible");
    $(".overlay").css("visibility", "visible");





    $image_crop = $('#upload-image').croppie({
        enableExif: true,
        viewport: {
            width: 250,
            height: 250
        },
        boundary: {
            width: 400,
            height: 400
        },
        showZoomer: false,
    });

    $image_crop.croppie('bind', {
        url: 'img/black.png',
    });

    $('#images').on('change', function () { 
        var reader = new FileReader();
        reader.onload = function (e) {
            $image_crop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });			
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('.buttonUp').on('click', function (ev) {	
        $image_crop.croppie('result', {
            type: 'canvas',
            size: "original", 
            format: "png", 
            quality: 1
        }).then(function (response) {
            $(".photo").attr("src", response);	
            $(".photo_form").css("visibility", "hidden");
            $(".overlay").css("visibility", "hidden");


            let path = $('input[name="file"]').val()	
            
            path = path.substring(12);
            
            let filename =path
            // let filename = 'photo-upload-'+Date.now()
            downloadBase64File(response, filename)
            $('.photo').attr('data-filepath', `C:/Users/Anya/Downloads/${filename}.png`)
        });
    });






    $("input[name='AddPhoto']").click(function(e){
        e.preventDefault();
        let path = $('input[name="file"]').val()	
            
            path = path.substring(12);
        

        // let path = document.getElementById("pic").src;
        
        // let path = $('input[name="file"]').val()

        //alert(path);

        let cathegories = $('select[name="cathegories"]').val(),
            albums = $('select[name="albums"]').val(),
            title = $('textarea[name="title"]').val(),
            // img_path = $('.photo').attr('src');
            img_path = `C:/Users/Anya/Downloads/${path}`;
           // alert(`IMAGE ${img_path}`)

            // var file = document.getElementById('img-upload').files[0]; //Files[0] = 1st file
            // var reader = new FileReader();
            // reader.readAsText(file, 'UTF-8');
            // reader.onload = shipOff;
            // img_path = $('.photo').attr('data-filepath');
        $.ajax({
            url:     "../php/addPhoto.php", 
            type:     "POST",
            dataType: "json",
            data: {
            img: img_path,
            name: path,
            cat: cathegories,
            album: albums,
            title: title
            },
            success: function(data) {
            alert("Изображение добавлено!");

                //alert("dddddd");
                    if(data.status == true){
                        console.log(data);
                        document.location.href = "../profile.php"; 
                    }
                   
            }
            });
        
    });

    



function downloadBase64File(contentBase64, fileName) {
    const linkSource = `${contentBase64}`;
    const downloadLink = document.createElement('a');
    document.body.appendChild(downloadLink);

    downloadLink.href = linkSource;
    downloadLink.target = '_self';
    downloadLink.download = `${fileName}`;
    downloadLink.click(); 
}





});




































    // $(".photo_form").css("visibility", "visible");
    // $(".overlay").css("visibility", "visible");





    // $image_crop = $('#upload-image').croppie({
    //     enableExif: true,
    //     viewport: {
    //         width: 250,
    //         height: 250
    //     },
    //     boundary: {
    //         width: 400,
    //         height: 400
    //     },
    //     showZoomer: false,
    // });

    // $image_crop.croppie('bind', {
    //     url: 'img/black.png',
    // });

//     $('#images').on('change', function () { 
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             $image_crop.croppie('bind', {
//                 url: e.target.result
//             }).then(function(){
//                 console.log('jQuery bind complete');
//             });			
//         }
//         reader.readAsDataURL(this.files[0]);
//     });

//     $('.buttonUp').on('click', function (ev) {	
//         $image_crop.croppie('result', {
//             type: 'canvas',
//             size: "original", 
//             format: "png", 
//             quality: 1
//         }).then(function (response) {
//             $(".photo").attr("src", response);	
//             $(".photo_form").css("visibility", "hidden");
//             $(".overlay").css("visibility", "hidden");
//             let filename = 'photo-upload-'+Date.now()
//             downloadBase64File(response, filename)
//             $('.photo').attr('data-filepath', `C:/Users/Anya/Downloads/${filename}.png`)
//         });
//     });









//     $("input[name='AddPhoto']").click(function(e){
//         e.preventDefault();

//         let cathegories = $('select[name="cathegories"]').val(),
//             albums = $('select[name="albums"]').val(),
//             title = $('textarea[name="title"]').val(),
//             // img_path = $('.photo').attr('src');
//             img_path = $('#img-upload').val();

//             var file = document.getElementById('img-upload').files[0]; //Files[0] = 1st file
//             var reader = new FileReader();
//             reader.readAsText(file, 'UTF-8');
//             reader.onload = shipOff;
//             // img_path = $('.photo').attr('data-filepath');
//         $.ajax({
//             url:     "../php/addPhoto.php", 
//             type:     "POST",
//             dataType: "json",
//             data: {
//             img: `../img/users/${img_path}`,
//             cat: cathegories,
//             album: albums,
//             title: title
//             },
//             success: function(data) {
                
//                 alert("dddddd");
//                     if(data.status == true){
//                         alert("true");
//                         console.log(data);
//                         document.location.href = "../profile.php"; 
//                     }
                   
//             }
//             });
        
//     });

// });

// function shipOff(event) {
//     var result = event.target.result;
//     var fileName = document.getElementById('img-upload').files[0].name; //Should be   'picture.jpg'
//     $.post('../php/write_file.php', { 
//         data: result, 
//         name: fileName 
//     }, continueSubmission);
// }

// function continueSubmission(data) {
//     console.log('data', data);
// }

// function downloadBase64File(contentBase64, fileName) {
//     const linkSource = `${contentBase64}`;
//     const downloadLink = document.createElement('a');
//     document.body.appendChild(downloadLink);

//     downloadLink.href = linkSource;
//     downloadLink.target = '_self';
//     downloadLink.download = `${fileName}`;
//     downloadLink.click(); 
// }