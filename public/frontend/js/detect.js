function onDevToolsOpen() {
  // document.getElementById('status').textContent = 'opened';
  setTimeout(console.clear.bind(console))
  setTimeout(() => {console.log(
    "%cDevTools is open!",
    "color:red"
  )}, 10);
  window.location.href = 'https://www.google.com';
  // var homeRoute = document.getElementById('detect').getAttribute('data-home-route');
  // window.location.href = homeRoute;
  // var appElement = document.getElementById('detect');
  // var homeRoute = appElement.getAttribute('data-home-route');
  // var redirected = appElement.getAttribute('data-redirected');

  // console.log('Redirected:', redirected);

  // // Check if redirection has not occurred
  // if (redirected === 'false') {
  //     console.log('Performing redirection');
  //     // Set the redirected attribute to true to prevent further redirections
  //     appElement.setAttribute('data-redirected', 'true');
  //     // Redirect to the home route
  //     window.location.href = homeRoute;
  // }
}

class DevToolsChecker extends Error {
  toString() {

  }

  get message() {
    onDevToolsOpen();
  }
}

console.log(new DevToolsChecker());

// function onDevToolsOpen() {
//   // Redirect to Google
//   window.location.href = 'https://www.google.com';
// }

// class DevToolsChecker extends Error {
//   constructor() {
//     super();
//     this.message = 'Check for developer tools';
//   }

//   get stack() {
//     onDevToolsOpen();
//     return super.stack;
//   }
// }

// console.log(new DevToolsChecker());
