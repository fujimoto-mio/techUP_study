const read1 = {
    name: 'white_red',
    greeting: function() {
      console.log(this.name);
    }
  }
   
  const read2 = {
    name: 'white_blue',
    greeting: function() {
      console.log(this.name);
    }
  }
   
  const read3 = {
    name: 'white_yellow',
    greeting: function() {
      console.log( this.name );
    }
  }

  read1.greeting();
  read2.greeting();
  read3.greeting();