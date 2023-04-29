import React from 'react';//Importa la bibliote clase react

class MenuPrincipal extends React.Component {
    constructor(props) {
        super(props);
    }
    state = {  }
    render() { 
        return ( 
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th >Column 1</th>
                        <th >Column 2</th>
                        <th >Column 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td>R1C1</td>
                        <td>R1C2</td>
                        <td>R1C3</td>
                    </tr>
                    <tr class="">
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                </tbody>
            </table>
        </div>
         );
    }
}
 
export default MenuPrincipal;

