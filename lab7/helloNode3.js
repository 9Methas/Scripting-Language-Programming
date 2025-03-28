const http = require('http');
const fs = require('fs');
const url = require('url');
const path = require('path');

http.createServer((req, res) => {
  const queryObject = url.parse(req.url, true).query;
  
  const originalFileName = queryObject.file1;
  const newFileName = queryObject.file2; 
  
  console.log(`file1 = ${originalFileName}`);
  console.log(`file2 =  ${newFileName}`);
  console.log(`File Renamed!`)

  const htmlContent = `
  <html>
  <body>
  <h1>Hello, your name!!</h1>
  <p>I am a developer.</p>
  <p>I work at SUT.</p>
  </body>
  </html>
  `;

  if (req.url.startsWith('/hello.htm')) {
    fs.writeFile(path.join(__dirname, originalFileName), htmlContent, (err) => {
      if (err) {
        res.writeHead(500, {'Content-Type': 'text/plain'});
        res.end('Error writing file');
        return;
      }

      fs.rename(path.join(__dirname, originalFileName), path.join(__dirname, newFileName), (err) => {
        if (err) {
          res.writeHead(500, {'Content-Type': 'text/plain'});
          res.end('Error renaming file');
          return;
        }

        res.writeHead(200, {'Content-Type': 'text/html'});
        res.end();
      });
    });
  } else {
    res.writeHead(404, {'Content-Type': 'text/plain'});
    res.end('Not Found');
  }
}).listen(3333, () => {});
