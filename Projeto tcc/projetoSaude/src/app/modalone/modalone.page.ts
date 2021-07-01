import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ModalController } from '@ionic/angular';

@Component({
  selector: 'app-modalone',
  templateUrl: './modalone.page.html',
  styleUrls: ['./modalone.page.scss'],
})
export class ModalonePage implements OnInit {
  sliderOpts= {
    zoom: {
      maxRatio: 2
    }
  }

  data: any;
  img: string;
  img1: string;
  img2: string;
  img3: string;
  img4: string;
  img5: string;
  info: string;
  info2: string;
  info3: string;
  info4: string;
  info5: string;
  info6: string;
  info7: string;
  info8: string;
  info9: string;
  infoExtra: string;
  
   constructor(private modalCtrl: ModalController, private route: ActivatedRoute) { 
    
    //this.route.queryParams.subscribe(params =>{
    //  console.log(params);
    //  if (params && params.data){
    //    this.data = parseFloat(params.data);
    //  }
    //});

    
    this.data = JSON.parse(localStorage.getItem('imc'));
    
    

    if (this.data.imc < 18.5){
      this.info= "Ovo";
      this.info2= "Cereais integrais";
      this.info3= "Iogurte natural";
      this.info4= "Gengibre";
      this.info5= "Café";
      this.info6= "Abacate";
      this.info7= "Tapioca";
      this.info8= "Salada de frutas";
      this.info9= "Suco verde";
      this.infoExtra= "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen boo";
      this.img= "assets/imagens/img.jpg";
      this.img1= "assets/imagens/img1.jpeg";
      this.img2= "assets/imagens/img2.jpg";
      this.img3= "assets/imagens/img3.jpg";
      this.img4= "assets/imagens/img4.jpg";
      this.img5= "assets/imagens/img5.jpg";

     }else if  (this.data.imc < 25){
      this.info= "Não sei";
      this.info2= "aaa";
      this.info3= "bb";
      this.info4= "violão";
      this.info5= "Nitroglicerina";
      this.info6= "Abacate";
      this.info7= "Tapioca";
      this.info8= "Salada de frutas";
      this.info9= "Suco verde";
      this.infoExtra= "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen boo";
      this.img= "assets/imagens/img6.jpg";
      this.img1= "assets/imagens/img7.jpg";
      this.img2= "assets/imagens/img8.jpg";
      this.img3= "assets/imagens/img9.jpg";
      this.img4= "assets/imagens/img10.jpg";
      this.img5= "assets/imagens/img11.jpg";

    }else if  (this.data.imc < 30){
      this.info= "Guitarra";
      this.info2= "Blastoise";
      this.info3= "Pikachu";
      this.info4= "Gengibre";
      this.info5= "Café";
      this.info6= "Abacate";
      this.info7= "Tapioca";
      this.info8= "kung fu panda";
      this.info9= "Suco verde";
      this.infoExtra= "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen boo";
      this.img= "assets/imagens/img12.jpg";
      this.img1= "assets/imagens/img13.jpg";
      this.img2= "assets/imagens/img14.jpg";
      this.img3= "assets/imagens/img15.jpg";
      this.img4= "assets/imagens/img16.jpg";
      this.img5= "assets/imagens/img17.jpg";
    }else if  (this.data.imc < 35){
      this.info= "Ovo";
      this.info2= "Cereais integrais";
      this.info3= "Iogurte natural";
      this.info4= "Gengibre";
      this.info5= "Café";
      this.info6= "Abacate";
      this.info7= "Tapioca";
      this.info8= "Salada de frutas";
      this.info9= "Suco verde";
      this.infoExtra= "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen boo";
      this.img= "assets/imagens/img23.jpg";
      this.img1= "assets/imagens/img24.jpg";
      this.img2= "assets/imagens/img25.jpg";
      this.img3= "assets/imagens/img26.jpg";
      this.img4= "assets/imagens/img27.jpg";
      this.img5= "assets/imagens/img28.jpg";
    }else if  (this.data.imc < 40){
      this.info= "Ovo";
      this.info2= "Cereais integrais";
      this.info3= "Iogurte natural";
      this.info4= "Gengibre";
      this.info5= "Café";
      this.info6= "Abacate";
      this.info7= "Tapioca";
      this.info8= "Salada de frutas";
      this.info9= "Suco verde";
      this.infoExtra= "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen boo";
      this.img= "assets/imagens/img29.jpg";
      this.img1= "assets/imagens/img30.jpg";
      this.img2= "assets/imagens/img31.jpg";
      this.img3= "assets/imagens/img32.jpg";
      this.img4= "assets/imagens/img33.jpg";
      this.img5= "assets/imagens/img34.jpg";
    }else if (this.data.imc > 40) {
      this.info= "Ovo";
      this.info2= "Cereais integrais";
      this.info3= "Iogurte natural";
      this.info4= "Gengibre";
      this.info5= "Café";
      this.info6= "Abacate";
      this.info7= "Tapioca";
      this.info8= "Salada de frutas";
      this.info9= "Suco verde";
      this.infoExtra= "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen boo";
      this.img= "assets/imagens/img35.jpg";
  }
}
  ngOnInit() {
    alert("O aplicativo não se responsabilizar por problemas envolvendo alergias a algum alimento dos cardapios gerados, consulte um medido para saber quais alimentos você pode comer, sua saude é importante.");
  }
  

  close(){
    this.modalCtrl.dismiss();
  }
}
