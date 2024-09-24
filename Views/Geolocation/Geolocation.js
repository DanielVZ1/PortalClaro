if ('geolocation' in navigator) {
    console.log('Geolocation está disponible');
  } else {
    console.log('Geolocation NO está disponible');
  }

  function success(position) {
    console.log(position);
  }
  
  navigator.geolocation.getCurrentPosition(success);

  {
    coords: {
      latitude: 1.314;
      longitude: 103.84425;
      altitude: null;
    }
    timestamp: 1708674456885;
  }