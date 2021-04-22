import { createContext, useContext, useState } from "react";

//context
const ModalContext = createContext({});

//provider
const ModalProvider = ({children}) => {
    const [modalState, setState] = useState({visible: false});
    const openModal = (payload) =>{
        setState({...payload, visible: true});
    }

    const closeModal = () =>{
        setState({visible :false});
    }

    return <ModalContext.Provider value={{modalState, openModal, closeModal}}>
        {children}
    </ModalContext.Provider>
}

//hock
const useModalContext = () => {
    const context = useContext(ModalContext);

    return context;
}

export { ModalProvider, useModalContext }