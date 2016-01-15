/*
 * C# Server Emulator Project Blackout / PointBlank
 * Authors: the__all
 * Copyright (C) 2015 | OZ-Network
 */
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Core.Database.Tables;
using PointBlank.Network.ServerPacket;
using Core.Model;

namespace PointBlank.Network.ClientPacket
{
    class PROTOCOL_BASE_LOGIN_WEBKEY_RUSSIA_REQ : ReceivePacket
    {
        string login, password;
        int loginLength, passwordLength;

        public PROTOCOL_BASE_LOGIN_WEBKEY_RUSSIA_REQ(Auth Client, byte[] data)
        {
            makeme(Client, data);
        }

        public override void ReadImpl()
        {
            ReadH();
            ReadH();
            ReadD();
            // ReadH();
            loginLength = ReadC();
            passwordLength = ReadC();
            //ReadC();
            login = ReadS(loginLength);
            password = ReadS(passwordLength);
        }
        public override void RunImpl()
        {
            if (AccountTable.accounts.ContainsKey(login) && AccountTable.accounts[login].Status == 0)
            {
                getClient().SendPacket(new PROTOCOL_BASE_LOGIN_ACK(0x80000100));//ваш аккаунт неподтвержен
                getClient().close();
            }
            else if (AccountTable.accounts.ContainsKey(login) && AccountTable.accounts[login].Status == 2)
            {
                getClient().SendPacket(new PROTOCOL_BASE_LOGIN_ACK(0x80000107));//ваш аккаунт заблокирован
                getClient().close();
            }
            else if (AccountTable.accounts.ContainsKey(login) && AccountTable.accounts[login].Password != password)
            {
                getClient().SendPacket(new PROTOCOL_BASE_LOGIN_ACK(0x80000102));//неверный пароль
                getClient().close();
            }
            else if (AccountTable.accounts.ContainsKey(login) && AccountTable.accounts[login].Password == password)
            {
                getClient().setLogin(login);
                getClient().setAccount(AccountTable.accounts[login]);
                getClient().SendPacket(new PROTOCOL_BASE_LOGIN_ACK(0x00000001));//успешная авторизация
            }
            else
            {
                Logger.Info("Аккаунт не найден");
            }
        }
    }
}
