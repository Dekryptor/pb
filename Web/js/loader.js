$.fn.preload = function() {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
}
$(['img1.jpg','img2.jpg','img3.jpg']).preload();