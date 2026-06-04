# Code without threading
import time; from tkinter import Tk, ttk, StringVar
def main():
  root = Tk()
  h = StringVar(value="Value before processing")
  def process():
    time.sleep(5)
    print(f"The processing is done")
    h.set("After processing")
  ttk.Button(root, text="Start processing", command=process,).grid(column=0, row=1)
  ttk.Button(root, text="Start sec processing", command=lambda : print("Hello world")).grid(column=1, row=1)
  ttk.Label(root, textvariable=h).grid(column=0, row=0)
  root.mainloop()
if __name__ == "__main__":
  main()

