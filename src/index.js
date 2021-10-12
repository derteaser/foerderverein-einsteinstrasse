import './index.css'

import BigPicture from "bigpicture/src/BigPicture";

(function() {
  // image gallery
  const imageLinks = document.querySelectorAll('.image-gallery a');
  for (let i = 0; i < imageLinks.length; i++) {
    imageLinks[i].addEventListener('click', function (e) {
      e.preventDefault()
      console.log(e.currentTarget.parentNode)
      BigPicture({
        el: e.target,
        imgSrc: e.currentTarget.getAttribute('href'),
        gallery: '.image-gallery',
        //galleryAttribute: 'href'
      })
    })
  }
})();

