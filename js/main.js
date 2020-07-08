/*Banner*/
$('.carousel .vertical .item').each(function(){
    var next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i=1;i<2;i++) {
        next=next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
    }
});


/* games */
function Game(){
    this.total=0;
    this.deg=0;
    this.random=0;
    this.spindeg=0;
    this.value =0;
    this.reward=0;
    this.options=[];
    this.pool= amout;
    this.round=0;
    this.poolEl=document.querySelector('.pool')
    this.rate=function(){
        this.random = Math.random()*this.total
    }
    this.setRate=function(value,reward,rate){
        this.total+=rate;
        var total=this.total;
        var origin = this.rate;
        var newfn = function(){
            origin.call(this)
            if(this.random<=total){
                this.random=this.total+1;
                this.value=value;
                this.reward=reward;
            }
        }
        this.rate=newfn
    }
    this.pay=function(money){
        this.pool-=money;
        this.changePool()
    }
    this.win=function(money){
        this.pool+=money;
        this.changePool()
    }
    this.changePool=function(){
        this.poolEl.textContent=this.pool;
    }
    this.hint=function(text){
        document.querySelector('.hint').textContent=text
    }
}

var game=new Game();
game.changePool()
game.setRate(0,0,4)
game.setRate(1,10000,0)
game.setRate(2,-500,10)
game.setRate(3,200,3)
game.setRate(4,0,10)
game.setRate(5,1000,1)
game.setRate(6,0,10)
game.setRate(7,1500,1)
game.setRate(8,0,10)
game.setRate(9,1000,1)
game.setRate(10,0,10)
game.setRate(11,500,4)
var spinner = document.querySelector('.spinner')
var pay = document.querySelector('.pay')
document.querySelector('.text').addEventListener('click',function(){
    if(!this.classList.contains('disabled')){
        if(game.pool>=0.1){
            var round=Math.floor(Math.random()*3)
            game.hint("Սպասեք ավարտին...")
            this.classList.add('disabled')
            pay.classList.add('pay-goTop')
            game.pay(0.1)
            game.rate()
            var adddeg=game.value-game.spindeg
            if(adddeg<0)
                adddeg+=12;
            game.spindeg=game.value
            if(adddeg==0&&round==0)
                game.deg+=360
            else
                game.deg+=adddeg*30+360*round
            spinner.style.transform="rotate("+game.deg+"deg)"
        } else{
            game.hint("Ձեր գումարը չի բավականացնում.")
            this.classList.add('disabled')
        }
    }
})
document.querySelector('.spinner').addEventListener('transitionend',function(){
    game.win(game.reward);
    if(game.reward==0)
        game.hint("Կրկին փորձիր հաջողություը մոտ է!")
    else if(game.reward==10000){
        game.hint("You Win the Biggest Reward!")
    }
    else if(game.reward<0){
        game.hint("Դուք պարտվեցիք "+(game.reward*-1))
    }
    else{
        game.hint("Դուք հաղթեցիք "+game.reward+" Դրամ!")
    }
    pay.classList.remove('pay-goTop')
    document.querySelector('.text').classList.remove('disabled')
})