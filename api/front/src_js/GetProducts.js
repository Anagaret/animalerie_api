import  { useState,useEffect } from "react";


const Products = () =>{
  const url = 'http://localhost/api/API/index.php/produit?apikey=845c4f3dd5ec02c3ff0caf3a1a255f9b'
  const useFetch = (url) => {
    const [state,setState] = useState({
      items: [],
      loading: true,
    })

    useEffect(() => {
      if(state.loading){
        (async () => {
          const res = await fetch(url)
          const data = await res.json()
          if (res.ok) {
            setState({
              items: data,
              loading: false,
            })
          } else {
            console.log(JSON.stringify(data))
            setState({
              items: [],
              loading: false,
            })
          }
        })()
      }
      
    }) 
    return [
      state.loading,
      state.items,
    ]
  }
  return(useFetch(url))

}

  export default Products