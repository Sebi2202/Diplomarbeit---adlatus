import { Component } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  username = '';
  password = '';
  constructor(private http: HttpClient) {}




  submit(us,pw) {

    /*
    let link = '../../../../';  //<- Das ist gefragt??
    let data = JSON.stringify({username: this.data.username, password:this.data.password});

    HTTP.post(link, data)
        .subscribe(data => {
          this.data.response = data._body;
        }, error => {
          console.log("Oooops!");
        });

        */

    console.log(us+pw);
  }

}
