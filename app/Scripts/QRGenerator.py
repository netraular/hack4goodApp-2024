"""_summary_
"""

import segno
import cv2


def qr_generate():
    """_summary_
    """
    qrcode = segno.make_qr(f"hack4good.duckdns.org/product?={ids[0]}")
    qrcode.save("basic_qr.png", scale=10)
    print("Hello World!")
    
    
    
def qr_read():
    """_summary_
    """
    img = cv2.imread('qr_read.jpeg')
    qcd = cv2.QRCodeDetector()
    
    retval, decoded_info, points, straight_qrcode = qcd.detectAndDecodeMulti(img)
    print(points)


def main():
    """_summary_
    hola
    """
    # qr_read()
    qr_generate()


if __name__ == "__main__":
    main()