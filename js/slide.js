const imgBox = document.querySelector('.imgBox');

const slides = imgBox.getElementsByTagName('img');

var i = 0;


function nextSlide(){
       
                slides[i].classList.remove('active');

                i=(i + 1 ) % slides.length;
            
                slides[i].classList.add('active');
         
 
}

function prevSlide(){

    slides[i].classList.remove('active');

    i=(i - 1 + slides.length) % slides.length;

    slides[i].classList.add('active');

}




function slideFunction(){
    setInterval(function() {
        nextSlide();

    }, 10000);
}