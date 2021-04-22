import { Modal as ModalComponent } from "antd";
import { useModalContext } from "./modal.context";

function Modal(){
    const { modalState: {message, title, visible}, closeModal} = useModalContext();

    return (
        <ModalComponent
        title={title}
            visible={visible}
            onOk={closeModal} 
            onCancel={closeModal}
        >
            <p>{message}</p>
      	</ModalComponent>
    );
}

export default Modal;