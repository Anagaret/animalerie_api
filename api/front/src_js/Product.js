/* eslint-disable no-unused-vars */
import React, { useState } from "react";




const Product = ({title,price,description,category, image,handleChangeAdd}) =>{
    const [qty, setQty] = useState(1);
    const handleChange = (e) =>{
        setQty(e.target.value)
    }
      
    return(
    <div id ="product">
        <form >
            <div >
                <img id="product-img"  src = {image} alt="Profil"/>
            </div>
            <div id="product-title">
                {title}
            </div>
            <div id="product-description">
                {description}
            </div>
            <div id="product-category">
                {category}
            </div> 
            <div>
                
            <div id="product-price">
                {price}$
            </div>
            <select value={qty} onChange= {handleChange}>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button id="button-add" type="button"  qty={qty} title={title} price={price} img = {image} onClick={handleChangeAdd}>
                Add
            </button>  
            </div>   
        </form> 
        
    </div>
)}

export default Product;
