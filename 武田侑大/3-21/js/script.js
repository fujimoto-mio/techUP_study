let img = new Image();
      img.src = "https://techup.tokyo/wp-content/uploads/2022/05/gosticon.png";
    
      const canvas = document.createElement('canvas');
      const context = canvas.getContext('2d');
      canvas.width = 700;
      canvas.height = 700;
      document.body.appendChild(canvas);
    
      const centerX = 250;
      const centerY = 250;
      const distanceFromCenter = 150;
      const circleSize = 20;

      let x = centerX;
      let y = centerY;
      let angleRad = 0;

      function loop(timestamp) {
        context.clearRect(0, 0, canvas.width, canvas.height);

        angleRad += 1 * Math.PI / 180;
        x = distanceFromCenter * Math.cos(angleRad) + centerX;
        y = distanceFromCenter * Math.sin(angleRad) + centerY;
      
        context.beginPath();
        context.drawImage(img, 10, 10, 4000, 4000, x, y, 500, 500);
        context.fill();
        
        window.requestAnimationFrame(loop);
      }
      window.requestAnimationFrame(loop);