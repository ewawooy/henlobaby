<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>henlo</title>

<style>
@import url('https://fonts.googleapis.com/css2?family=Mouse+Memoirs&display=swap');
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background-image:
        linear-gradient(rgba(255,255,255,0.45), rgba(255,255,255,0.45)),
        url('bg.jpg');
    background-repeat:repeat, repeat;
    background-size:auto, 900px auto;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;
}

.container{
    width:90%;
    max-width:900px;
    background:white;
    padding:30px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,.2);
    position:relative;
    z-index:1;
    animation:fadeInUp .7s ease;
}

#closeContainerBtn{
    position:absolute;
    top:14px;
    right:18px;
    display:none;
    background:transparent;
    border:none;
    font-size:22px;
    cursor:pointer;
    color:#999;
    transition:.2s;
}

#closeContainerBtn:hover{
    color:#555;
    transform:scale(1.1);
}

h1{
    color:#ff4d6d;
    margin-bottom:20px;
}

#letter{
    display:none;
    margin-top:20px;
    line-height:1.8;
    color:#444;
}

button{
    padding:12px 25px;
    border:none;
    border-radius:30px;
    cursor:pointer;
    margin:10px;
    font-size:16px;
    transition:.3s;
}

button:hover{
    transform:translateY(-2px) scale(1.03);
}

#openBtn{
    background:#ff4d6d;
    color:white;
}

#yes{
    background:#28a745;
    color:white;
    display:none;
}

#no{
    background:#dc3545;
    color:white;
    position:absolute;
    display:none;
}

.hidden{
    display:none;
}

#result{
    color: black;
    font-size:22px;
    font-weight:bold;
}

.result-card{
    display:none;
    margin-top:20px;
    padding:18px 20px;
    border-radius:16px;
}

#bgVideo{
    position:fixed;
    inset:0;
    display:none;
    width:100%;
    height:100%;
    object-fit:cover;
    background:#000;
    z-index:0;
}

#backToCardBtn{
    position:fixed;
    top:18px;
    left:18px;
    display:none;
    padding:10px 18px;
    background:rgba(255,255,255,.92);
    color:#333;
    border:none;
    border-radius:999px;
    cursor:pointer;
    z-index:3;
    font-size:16px;
}

#typedLetter{
    min-height:170px;
    white-space:pre-line;
    font-family: "Mouse Memoirs", sans-serif;
        font-size:26px;
}

.heart{
    position:fixed;
    bottom:-30px;
    font-size:24px;
    animation:floatUp 2.4s ease-out forwards;
    pointer-events:none;
    z-index:2;
}

@keyframes floatUp{
    to{
        transform:translateY(-110vh) rotate(20deg);
        opacity:0;
    }
}

@keyframes fadeInUp{
    from{
        opacity:0;
        transform:translateY(14px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}
</style>

</head>
<body>

<audio id="bgMusic" src="bwy.mp3" preload="auto" loop></audio>

<div class="container">

<button id="closeContainerBtn" type="button">×</button>

<div id="introContent">
<h1 style="font-family: 'Mouse Memoirs', Arial, Helvetica, sans-serif; font-size: 26px;">I'm Sorry❤️</h1>

<p style="font-family: 'Mouse Memoirs', Arial, Helvetica, sans-serif; font-size: 26px;">Here's a little something I made for you.</p> <br>

<button id="openBtn">Open My Letter</button>
</div>

<div id="letter">
    <p id="typedLetter"></p>

    <br>

    <button id="yes" style="font-family: 'Mouse Memoirs', Arial, Helvetica, sans-serif; font-size: 22px;">Yes</button>
    <button id="no" style="font-family: 'Mouse Memoirs', Arial, Helvetica, sans-serif; font-size: 22px;">No</button>
</div>

<div id="resultCard" class="result-card">
    <div id="result" style="font-family: 'Mouse Memoirs', Arial, Helvetica, sans-serif; font-size: 26px;">
        Thank you...❤️<br>
        I promise I'll do better. Click the X button for a surprise :pp.
    </div>
</div>
   
    </div>

<video
        id="bgVideo"
        src="apologyvid.mp4"
        preload="auto"
        loop
        playsinline
        muted
></video>

<button id="backToCardBtn" type="button">Back</button>

<script>

const openBtn=document.getElementById("openBtn");
const closeContainerBtn=document.getElementById("closeContainerBtn");
const introContent=document.getElementById("introContent");
const letter=document.getElementById("letter");
const noBtn=document.getElementById("no");
const yesBtn=document.getElementById("yes");
const resultCard=document.getElementById("resultCard");
const result=document.getElementById("result");
const typedLetter=document.getElementById("typedLetter");
const bgMusic=document.getElementById("bgMusic");
const bgVideo=document.getElementById("bgVideo");
const backToCardBtn=document.getElementById("backToCardBtn");
const letterText=`hi baby,
i'm writing this letter and did this website as soon as i got home hehe.it still bothers me that up until now things still aren't okay between us. i don't know if i can make things okay again or go back to how things were before :< again, i want to say sorry for all the things i did and said that hurt you. i want you to know that i've been reflecting and realizing how immature i was. i js want you to know that i love you and i hope we can be okay again :<< i miss you linggit!!! hope this helps lighten up your mood :>>

Will you forgive me?`;
let isTypingDone=false;

function typeLetter(){
    if(isTypingDone) return;

    let i=0;
    typedLetter.textContent="";
    yesBtn.style.display="none";
    noBtn.style.display="none";
    const timer=setInterval(()=>{
        typedLetter.textContent+=letterText[i];
        i++;
        if(i>=letterText.length){
            clearInterval(timer);
            isTypingDone=true;
            yesBtn.style.display="inline-block";
            noBtn.style.display="inline-block";
        }
    },20);
}

function createHeart(){
    const heart=document.createElement("span");
    heart.className="heart";
    heart.textContent="❤️";
    heart.style.left=Math.random()*100+"vw";
    heart.style.opacity=(Math.random()*0.5+0.5).toString();
    document.body.appendChild(heart);
    setTimeout(()=>heart.remove(),2400);
}

openBtn.onclick=()=>{
    letter.style.display="block";
    openBtn.style.display="none";
    typeLetter();
    if(bgMusic){
        bgMusic.currentTime=0;
        bgMusic.play().catch(()=>{});
    }
}

yesBtn.onclick=()=>{
    resultCard.style.display="block";
    letter.style.display="none";
    yesBtn.style.display="none";
    noBtn.style.display="none";
    closeContainerBtn.style.display="block";
    if(introContent){
        introContent.style.display="none";
    }

    document.body.style.background="linear-gradient(135deg,#c3f584,#9be15d)";
    for(let i=0;i<18;i++){
        setTimeout(createHeart,i*120);
    }
}

closeContainerBtn.addEventListener("click",()=>{
    const container=document.querySelector(".container");
    if(container){
        container.style.display="none";
    }
    if(bgVideo){
        bgVideo.style.display="block";
        bgVideo.currentTime=0;
        bgVideo.play().catch(()=>{});
    }
    if(backToCardBtn){
        backToCardBtn.style.display="block";
    }
});

backToCardBtn.addEventListener("click",()=>{
    const container=document.querySelector(".container");
    if(bgVideo){
        bgVideo.style.display="none";
    }
    if(backToCardBtn){
        backToCardBtn.style.display="none";
    }
    if(container){
        container.style.display="block";
    }
});

noBtn.addEventListener("mouseover",()=>{

    const x=Math.random()*(window.innerWidth-120);
    const y=Math.random()*(window.innerHeight-60);

    noBtn.style.left=x+"px";
    noBtn.style.top=y+"px";

});

</script>

</body>
</html>