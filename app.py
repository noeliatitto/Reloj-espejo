print("ingrese la hora en formato 12 horas")

hora, minuto = map(int, input().split(":"))
if hora > 12 or minuto > 60:
    print("formato de hora o minuto no valido")
else:
    hora_real = 12 - hora
    minuto_real = 60 - minuto

    if minuto_real == 60:
        minuto_real = 0

    if hora_real == 0:
        hora_real = 12

    print(f"{hora_real:02d}:{minuto_real:02d}")
