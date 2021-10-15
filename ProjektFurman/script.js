var clickedMenu = false;
var list2019 = false;
var list2020 = false;
var list2021 = false;
var menu = false;
var log = false;
$('.choose').click(function(){
    if(clickedMenu == false){
    $('.menu-item').css('display', 'block');    
    clickedMenu = true;
    }
    else if(clickedMenu == true){
        $('.menu-item').css('display', 'none');
        clickedMenu = false;
    }
});
//2019, 2020, 2021 slide down
$('.2019').click(function(){
    if(list2019 == false){
        $('.2019').css('color', '#000');
        $('.2020').css('color', '#fff');
        $('.2021').css('color', '#fff');
    $('.item-2019').each(function(x){
        $('.item-2019').eq(x).css('display', 'block');
    });
    $('.item-2020').each(function(x){
        $('.item-2020').eq(x).css('display', 'none');
    });
    $('.item-2021').each(function(x){
        $('.item-2020').eq(x).css('display', 'none');
    });
    list2019 = true;
    list2020 = false;
    list2021 = false;
}
else{
    $('.2019').css('color', '#fff');
    $('.item-2019').each(function(x){
        $('.item-2019').eq(x).css('display', 'none');
    });
    
    list2019 = false;
}
});

$('.2020').click(function(){
    if(list2020 == false){
        $('.2020').css('color', '#000');
        $('.2019').css('color', '#fff');
        $('.2021').css('color', '#fff');
    $('.item-2020').each(function(x){
        $('.item-2020').eq(x).css('display', 'block');
    });
    $('.item-2021').each(function(x){
        $('.item-2021').eq(x).css('display', 'none');
    });
    $('.item-2019').each(function(x){
        $('.item-2019').eq(x).css('display', 'none');
    });
    list2020 = true;
    list2019 = false;
    list2021 = false;
}
else{
    $('.2020').css('color', '#fff');
    $('.item-2020').each(function(x){
        $('.item-2020').eq(x).css('display', 'none');
    });
    list2020 = false;
}
});

$('.2021').click(function(){
    if(list2021 == false){
        $('.2021').css('color', '#000');
        $('.2020').css('color', '#fff');
        $('.2019').css('color', '#fff');
    $('.item-2021').each(function(x){
        $('.item-2021').eq(x).css('display', 'block');
    });
    $('.item-2020').each(function(x){
        $('.item-2020').eq(x).css('display', 'none');
    });
    $('.item-2019').each(function(x){
        $('.item-2019').eq(x).css('display', 'none');
    });
    list2021 = true;
    list2020 = false;
    list2019 = false;
}
else{
    $('.2021').css('color', '#fff');
    $('.item-2021').each(function(x){
        $('.item-2021').eq(x).css('display', 'none');
    });
    list2021 = false;
}
});


$('.icon-menu').click(function(){
    if(menu == false){
    $('.icon-menu').css({
        'color': '#fd4e18',
        'transition': '0.5s'
    });
    $('.menu-list').css({
        'display': 'block',
        'animation': 'show 0.5s '
    });
    $('.icon-user').css({
        'color': '#fff',
        'transition': '0.5s'
    });
    $('.logout').css({
        'display': 'none'
    });
    menu = true;
}
else{
    $('.icon-menu').css({
        'color': '#fff',
        'transition': '0.5s'
    });
    $('.menu-list').css({
        'display': 'none'
        
    });
    menu = false;   
}
});
$('.icon-user').click(function(){
    if(log == false){
    $('.icon-user').css({
        'color': '#fd4e18',
        'transition': '0.5s'
    });
    $('.logout').css({
        'display': 'block',
        'animation': 'show 0.5s '
    });
    $('.icon-menu').css({
        'color': '#fff',
        'transition': '0.5s'
    });
    $('.menu-list').css({
        'display': 'none' 
    });
    log = true;
}
else{
    $('.icon-user').css({
        'color': '#fff',
        'transition': '0.5s'
    });
    $('.logout').css({
        'display': 'none',
    });
    log = false;   
}
});
if($('#add')){
    $('#who').change(function(){
        var selected = $(this).children('option:selected').val();
        if(selected != 'NIE WYBRANO' && selected != null){
            $('#who').css('color', '#000');
        }
        else{
            $('#who').css('color', '#fff');
        }
    });
    $('#date').change(function(){
        console.log()
        var selected = $(this).val();
        if(selected != 'DD.MM.RRRR' && selected != null){
            $('#date').css('color', '#000');
        }
        else{
            $('#date').css('color', '#fff');
        }
    });
    $('#with').change(function(){
        var selected = $(this).children('option:selected').val();
        if(selected != 'NIE WYBRANO' && selected != null){
            $('#with').css('color', '#000');
        }
        else{
            $('#with').css('color', '#fff');
        }
    });
}
$(window).resize(function(){
    let width = $(window).width();
    if(width > 767){
        $('.logout').css('display', 'block');
        $('.menu-list').css('display', 'block');
    }
    else{
        $('.logout').css('display', 'none');
        $('.menu-list').css('display', 'none');
    }
})