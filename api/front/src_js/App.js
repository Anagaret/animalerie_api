import React, { useState, useEffect } from "react";
import ProductsList from './ProductsList';
import Cart from './Cart';
import Products from './GetProducts';


const Checkbox = ({ name, value, onChange, children }) => (
  <div>
    <label htmlFor={name}>{children}</label>
    <input type="checkbox" id={name} name={name} checked={value} onChange={onChange} />
  </div>
)





const App = () =>{
  
  const [loading, products] = Products()
  
  
  const List = () => {
    const Search = () =>{
        const [searchTerm, setSearchTerm] = useState("");
      const [searchResults, setSearchResults] = useState([]);
      const handleChange = event => {
        setSearchTerm(event.target.value);
      }; 
      useEffect(() => {
        const results = products.filter(product =>
          product.title.toLowerCase().includes(searchTerm)
        );
        setSearchResults(results);
      }, [searchTerm]);

      
      return [
        searchTerm,
        searchResults,
        handleChange
      ]
    }
    const [searchTerm,searchResults, handleChange] = Search()
    let category = []
      for(let i = 0 ; i < products.length; i++) {
        if(!category.includes(products[i].category)){
          category.push(products[i].category)
        }
      }
    
    const Box = () =>{
      const [searchTerms, setSearchTerms] = useState([]);
      
      
      const handleChangeBox = event => {
        let tab = []
        event.target.checked?tab= [...searchTerms,event.target.name]: searchTerms.indexOf(event.target.name)>-1? tab=[...searchTerms.slice(0,searchTerms.indexOf(event.target.name)),...searchTerms.slice(searchTerms.indexOf(event.target.name)+1)] : tab =[...searchTerms]
        setSearchTerms(tab)
      };
      return [
        searchTerms,
        handleChangeBox]
    }
    

    

    const Price = () =>{
      const [prixMin, setPrixMin] = useState(0);
      const [prixMax, setPrixMax] = useState(1000);

      const handleChangePriceMin = event => {
        event.target.value ==="" || event.target.value < 0?setPrixMin(0):
        setPrixMin(event.target.value)
      };
      const handleChangePriceMax = event => {
        event.target.value ===""|| event.target.value< 0?setPrixMax(0):
        setPrixMax(event.target.value)
      };
      return [
        prixMin,
        prixMax,
        handleChangePriceMin,
        handleChangePriceMax
      ]
    }

    const[prixMin,prixMax,handleChangePriceMin,handleChangePriceMax] = Price()

    const  [searchTerms,handleChangeBox] = Box()
    const Tri = () =>{
      let result = []
      if(searchTerms.length>0){
        for(let i = 0 ; i < searchTerms.length; i++){
          result = [...result,...searchResults.filter(product =>
            product.category.toLowerCase() === searchTerms[i] && 
            product.price>prixMin &&product.price<prixMax
          )];
        }
      }else {
        result = [...result,...searchResults.filter(product =>
          product.price>prixMin &&product.price<prixMax
        )];
      }
      return result
    } 
    
    const tri = Tri()

    


    const Shoppingcart = () =>{
        const [show, setShow] = useState(false);
        const [productCart, setProductCart] = useState([]);
        const [nbElement, setnbElement] = useState(0);
        const [prixTotal, setprixTotal] = useState(0);

        const handleChangeshow = () => {
          setShow(!show)
        };
        const handleChangeAdd = event => {
          const qty  = parseInt(event.target.attributes.qty.nodeValue,10)
          const price  = parseInt(event.target.attributes.price.nodeValue,10)
          const title  = event.target.attributes.title.nodeValue
          const img =event.target.attributes.img.nodeValue
          let result =[]
          const element = productCart.filter(el=> el[0] === title)
          if(element.length>0){
            const index = productCart.indexOf(element[0])
            const qtyElem = productCart[index][1]
            if(qtyElem+qty>0){
              result= [...productCart.slice(0,index),[title,qtyElem+qty,price,img],...productCart.slice(index+1)]
            }else{
              result= [...productCart.slice(0,index), ...productCart.slice(index+1)]
            }
            
            
          }else{
          result = [...productCart, [title,qty,price,img]]
          
          }
          setnbElement(result.length)
          setProductCart(result)
          setprixTotal(prixTotal + qty * price)
          
        };
        const handleChangesEmpty = event => {
          setnbElement(0)
          setProductCart([])
          setprixTotal(0)
        }
      
      return [
        show,
        handleChangeshow,
        productCart,
        nbElement,
        prixTotal,
        handleChangeAdd,
        handleChangesEmpty
      ]
    }

    const [show, handleChangeshow,productCart, nbElement, prixTotal,
      handleChangeAdd,handleChangesEmpty] = Shoppingcart()


     
    
    return (
      <div id ="root">
        <div id="head">
          <div id = "nameShop">REact Shop</div>
          <div id="cart">
            {show? <Cart productsCart={productCart} handleChangeshow={handleChangeshow} 
             nbElement={nbElement} prixTotal= {prixTotal}handleChangeAdd ={handleChangeAdd} handleChangesEmpty={handleChangesEmpty}/> : <button onClick={handleChangeshow}>cart:{nbElement}</button>}
          </div>
        </div>
        &nbsp;<div id="filter">
          <label>Filters</label><br/>
          <input
          type="text"
          placeholder="Search"
          value={searchTerm}
          onChange={handleChange}
          /><br/>
          {category.map((cat) => 
            <Checkbox key ={cat}  name = {cat} onChange ={ handleChangeBox} children ={cat}/>
            )}<br/>
          <label>Price</label><br/>
          <input id= "min"
          type="number"
          placeholder="Min"
          value={prixMin}
          onChange={handleChangePriceMin}
          />
          <input id= "max"
          type="number"
          placeholder="Max"
          value={prixMax}
          onChange={handleChangePriceMax}
          />
        </div>
        {loading ? <p><br/><br/><br/><br/>&nbsp;Loading...</p>: tri.length===0? <div><br/><br/><br/><br/>&nbsp;No product Found</div>:
        <ProductsList products={tri} handleChangeAdd={handleChangeAdd}/> }
      </div>
      
    )
        }
        return (<List/>)
  
}


export default App