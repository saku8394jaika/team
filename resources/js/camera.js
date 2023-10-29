import axios from 'axios';

let width = 320;
let height = 0;

let streaming = false;

const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const photo = document.getElementById('photo');
const startbutton = document.getElementById('startbutton');
let constrains = { video: true, audio: false };

const startUp = () => {
    videoStart();
    
    if(video){
        video.addEventListener('canplay', function(e){
            if(!streaming){
                height = video.videoHeight / (video.videoWidth/width);
                
                video.setAttribute('width', width);
                video.setAttribute('height', height);
                canvas.setAttribute('width', width);
                canvas.setAttribute('height', height);
                streaming = true;
            }
        }, false);
    };
    
    if(startbutton){
        startbutton.addEventListener('click', function(e){
            takepicture();
            e.preventDefault();
        }, false);
    }
};

const videoStart = () => {
    streaming = false;
    
    navigator.mediaDevices.getUserMedia(constrains)
    .then(function(stream) {
        // console.log(stream);
        video.srcObject = stream;
        video.play();
    })
    .catch(function(err) {
      console.log("An error occured! " + err);
    })
};

const takepicture = () => {
    let context = canvas.getContext('2d');
    if(width && height){
        canvas.width = width;
        canvas.height = height;
        context.drawImage(video, 0, 0, width, height);
        send();
        //console.log("canvas:" + canvas.toDataURL('image/png').replace(/^.*,/, ''));
        // const txt = document.getElementById('readStr');
        // txt.value = canvas.toDataURL('image/png');
        // document.getElementById('canvasImg').src = canvas.toDataURL('image/png');
    }
}

const send = () => {
    const data = canvas.toDataURL('image/png');
    console.log(data.length);
    document.getElementById("image").value = data;
    startbutton.submit();
    // axios.post('/sample', {
    //     data: {image: data},
    // }).then((response) => {
    //     console.log("success");
    //     console.log(response);
    // }).catch((error) => {
    //     console.log("NG");
    // })
}

startUp();