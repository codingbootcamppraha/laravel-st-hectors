import React from 'react';
import Search from './Search.jsx';

/**
 * BEWARE!!
 * This is a class-based component. It is nothing to be scared of, it will
 * no harm you in any way. It is just older than the functinal components
 * that you are using and should continue to use in the future.
 */
export default class App extends React.Component {
    constructor(props) {
        super(props)
    }

    render() {
        return (
            <main>
                <Search />
            </main>
        )
    }
}