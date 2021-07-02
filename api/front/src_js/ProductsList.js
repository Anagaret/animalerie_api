import React from 'react'
import Product from './Product'



const ProductsList = ({ products,handleChangeAdd }) => {
  
  return(
    <div id="products">
      {products.map(product =>
        <Product
          key={product.id}
          title={product.title}
          price={product.price}
          description={product.description}
          category={product.category}
          image={product.image}
          handleChangeAdd={handleChangeAdd}
        />
      )}
    </div>
  )
}

export default ProductsList