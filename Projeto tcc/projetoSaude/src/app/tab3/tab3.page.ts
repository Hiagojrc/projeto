import { Component } from '@angular/core';
import { HttpClient, HttpHeaders} from '@angular/common/http';

//import { EmailComposer } from '@ionic-native/email-composer'; 
@Component({
  selector: 'app-tab3',
  templateUrl: 'tab3.page.html',
  styleUrls: ['tab3.page.scss']
})
export class Tab3Page {
  name: string;
  email: string;
  assunta: string;
  message: string;

  constructor(public httpClient:HttpClient) {}

  evento(){
    let postData = {
      "name": this.name,
      "email": this.email,
      "assunta": this.assunta,
      "message": this.message
      };

      
    console.log(postData);

    let bodyString = JSON.stringify(postData); // Stringify payload
         console.log(bodyString);
    
    this.httpClient.post("http://senai.bicou.com.br/index.php", bodyString)
      .subscribe(data => {
        console.log(data);
       }, error => {
        console.log(error);
      });
    }
  ngOnInit() {
    alert("Utilize esse formulario para nos informar de qualquer problema relacionado a falhas no sistema ou sugestões para melhorias, ficaremos muito felizes de ver sua avaliação");
  }
}
